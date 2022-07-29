<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\MonthlyAmortization;
use App\Transaction;
use App\Customer;
use App\Penalty;
use App\AreaDetailLot;
use Carbon\Carbon;
use DateTime;
use Auth;

class TransactionController extends Controller
{
    public function reservation(Request $request)
    {
        $area = $request->validate([
            'code' => ['required', 'max:250'],
            'lot_id' => ['required', 'max:250'],
            'block_no' => ['required', 'max:250'],
            'lot_no' => ['required', 'max:250'],
            'payment_classification' => ['required', 'max:250'],
            'customer_id' => ['required', 'max:250'],
            'payment_date' => ['required', 'max:250'],
            'payment_type' => ['required', 'max:250'],
            'amount' => ['required', 'max:250'],
            'reference_no',
            'or_no',
            'attachment',
            'remarks' => ['required'],
        ]);

        $request->request->add(['created_user' => Auth::user()->id]);

        $file = $request->attachment->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);

        $imageName = $filename.time().'.'.$request->attachment->extension();  
        $image = $request->attachment->move(public_path('customer_file/' . $request->customer_id . '-' . $request->lot_id), $imageName);

        $requestData = $request->all();
        $requestData['attachment'] = $imageName;

        Payment::create($requestData);

        $transaction = new Transaction([
            'code' => $request->code,
            'customer_id' => $request->customer_id,
            'lot_id' => $request->lot_id,
            'created_user' => Auth::user()->id,
        ]);

        $transaction->save();

        AreaDetailLot::where("id", $request->lot_id)->update(["status" => "RESERVED", 'reservation_date' => $request->payment_date]);
        return redirect()->back()->with('success','Successfully Added');
    }

    public function checkdp($id)
    {
        $transaction = Transaction::where('lot_id', $id)->firstOrFail();
        if(Payment::where('code', $transaction->code)->where('payment_classification', 'DP')->exists()) {
            return response()->json(['Message' => 'DETECTED']);
        } else {
            return response()->json(['Message' => 'NONE']);
        }
    }

    public function soa($id)
    {
        $transaction = Transaction::where('lot_id', $id)->firstOrFail(); 
        $id = $id;
        $customer = Customer::where('id', $transaction->customer_id)->firstOrFail(); 
        $lot = AreaDetailLot::where('id', $transaction->lot_id)->with('block')->firstOrFail(); 
        $dp = Payment::where('code', $transaction->code)->where('payment_classification', 'DP')->firstOrFail();
        $res = Payment::where('code', $transaction->code)->where('payment_classification', 'RES')->firstOrFail();
        $payments = Payment::where('code', $transaction->code)->where('payment_classification', '!=', 'PEN')->with('customer')->get();
        $amortizations = MonthlyAmortization::where('transaction_id', $id)->where('status', 'UNPAID')->get();
        $penalties = Penalty::where('transaction_id', $id)->where('status', 'UNPAID')->get();

        return view('backend.pages.area.soa', compact('payments', 'customer', 'lot', 'dp', 'res', 'id', 'amortizations', 'penalties'));
    }

    function getSameDayNextMonth(DateTime $startDate, $numberOfMonthsToAdd = 1) {
        $startDateDay = (int) $startDate->format('j');
        $startDateMonth = (int) $startDate->format('n');
        $startDateYear = (int) $startDate->format('Y');
    
        $numberOfYearsToAdd = floor(($startDateMonth + $numberOfMonthsToAdd) / 12);
        if ((($startDateMonth + $numberOfMonthsToAdd) % 12) === 0) {
          $numberOfYearsToAdd--;
        }
        $year = $startDateYear + $numberOfYearsToAdd;
    
        $month = ($startDateMonth + $numberOfMonthsToAdd) % 12;
        if ($month === 0) {
          $month = 12;
        }
        $month = sprintf('%02s', $month);
    
        $numberOfDaysInMonth = (new DateTime("$year-$month-01"))->format('t');
        $day = $startDateDay;
        if ($startDateDay > $numberOfDaysInMonth) {
          $day = $numberOfDaysInMonth;
        }
        $day = sprintf('%02s', $day);
    
        return new DateTime("$year-$month-$day");
      }

    public function generate_amortization(Request $request, $id)
    {
        $transaction = Transaction::where('lot_id', $id)->firstOrFail(); 
        AreaDetailLot::where("id", $id)->update(["purchase_date" => $request->purchase_date, 'end_date' => $request->end_date]);
        $to = Carbon::createFromFormat('Y-m-d', $request->purchase_date);
        $from = Carbon::createFromFormat('Y-m-d', $request->end_date);
        $diff_in_months = $to->diffInMonths($from);
        $startDate = new DateTime($request->purchase_date);
        Transaction::where("code", $transaction->code)->update(["starting_date" => $request->purchase_date, 'duration' => $diff_in_months]);
        $lot = AreaDetailLot::where('id', $transaction->lot_id)->with('block')->firstOrFail(); 
        $dp = Payment::where('code', $transaction->code)->where('payment_classification', 'DP')->firstOrFail();
        $res = Payment::where('code', $transaction->code)->where('payment_classification', 'RES')->firstOrFail();
        $customer = Customer::where('id', $transaction->customer_id)->firstOrFail(); 

        $remaining_balance = $lot->tcp - $dp->amount - $res->amount;
        $monthly_amortization = $remaining_balance/$diff_in_months;
        for ($i=1; $i < $diff_in_months; $i++) {
            $monthlyAmort = new MonthlyAmortization([
                'transaction_id' => 3,
                'payment_date' => $this->getSameDayNextMonth($startDate, $i)->format('Y-m-d'),
                'payment_classification' => 'MA',
                'amount' => $monthly_amortization,
                'status' => 'UNPAID',
                'created_user' => Auth::user()->id,
            ]);

            $monthlyAmort->save();
        }

        return redirect()->back()->with('success','Successfully Added');
    }

    public function penalty()
    {
        $transaction_lot = Transaction::where('status', 'ACTIVE')->get();

        foreach ($transaction_lot as $key => $transaction) {
            $penalty_months = MonthlyAmortization::where('transaction_id', $transaction->id)->where('status', 'UNPAID')->whereDate('payment_date', '<', now())->get();
            foreach ($penalty_months as $key => $monthly_amortization) {
                $penalty = new Penalty([
                    'monthly_amortization_id' => $monthly_amortization->id,
                    'transaction_id' => $monthly_amortization->transaction_id,
                    'penalty_date' => now(),
                    'payment_classification' => 'PEN',
                    'amount' => 150,
                    'status' => 'UNPAID',
                ]);
                $penalty->save();
            }
        }
    }
}
