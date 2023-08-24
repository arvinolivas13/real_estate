<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\MonthlyAmortization;
use App\Transaction;
use App\Customer;
use App\TransferFee;
use App\Penalty;
use App\AreaDetailLot;
use Carbon\Carbon;
use DateTime;
use Auth;
use DB;

class TransactionController extends Controller
{
    public function reservation(Request $request)
    {
        $area = $request->validate([
            'code' => ['required', 'max:250'],
            'lot_id' => ['required', 'max:250'],
            'subscriber_no' => ['required'],
            'block_no' => ['required', 'max:250'],
            'lot_no' => ['required', 'max:250'],
            'payment_classification' => ['required', 'max:250'],
            'customer_id' => ['required', 'max:250'],
            'date' => ['required', 'max:250'],
            'payment_id' => ['required', 'max:250'],
            'amount' => ['required', 'max:250'],
            'reference_no',
            'or_no',
            'attachment',
            'remarks',
        ]);

        $request->request->add(['created_user' => Auth::user()->id]);

        if($request->attachment != null) {
            $file = $request->attachment->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);

            $imageName = $filename.time().'.'.$request->attachment->extension();
            $image = $request->attachment->move(public_path('customer_file/' . $request->customer_id . '-' . $request->lot_id), $imageName);

            $requestData = $request->all();
            $requestData['attachment'] = $imageName;
            Payment::create($requestData);
        } else {
            Payment::create($request->all());
        }

        $transaction = new Transaction([
            'code' => $request->code,
            'customer_id' => $request->customer_id,
            'lot_id' => $request->lot_id,
            'created_user' => Auth::user()->id,
        ]);

        $transaction->save();

        AreaDetailLot::where("id", $request->lot_id)->update(["status" => "RESERVED", 'reservation_date' => $request->date]);
        return redirect()->back()->with('success','Successfully Added');
    }

    public function checkdp($id)
    {
        $transaction = Transaction::where('lot_id', $id)->firstOrFail();
        if(Payment::where('code', $transaction->code)->where('payment_classification', 'DP')->exists()) {
            return response()->json(['Message' => 'DETECTED']);
        } else {

            $customer = Customer::where('id', $transaction->customer_id)->first();
            return response()->json(['Message' => 'NONE', 'customer' => $customer]);
        }
    }

    public function account_exists($id)
    {
        if(AreaDetailLot::where('subscriber_no', $id)->where('status', 'ACTIVE')->exists()) {
            return response()->json(['Message' => 'DETECTED']);
        } else {
            return response()->json(['Message' => 'NONE']);
        }
    }

    public function check_soa($lastname, $birthday, $subscriber_no)
    {
        $subcriber = AreaDetailLot::where('subscriber_no', $subscriber_no)->first();
        $transaction = Transaction::where('lot_id', $subcriber->id)->first();

        if($transaction->customer->lastname === $lastname && $transaction->customer->birthday === $birthday) {
            return response()->json(['transaction' => $subcriber->id]);
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
        $payment_transfer_fee = Payment::where('code', $transaction->code)->where('payment_classification', 'TF')->with('customer')->get();
        $amortizations = MonthlyAmortization::with('payment', 'payment.paymenttype')->where('transaction_id', $transaction->id)->orderBy('payment_date')->get();
        $generate_amortization = MonthlyAmortization::where('transaction_id', $transaction->id)->exists();
        $remaining_balance = $lot->tcp - $dp->amount - $res->amount;

        // Regular Pay
        $payments = Payment::where('code', $transaction->code)->where('payment_classification', '!=', 'PEN')->with('customer', 'transaction_record', 'amortization')->get();
        $regular_amount_pay = $payments->sum('amount');

        // Penalty Fee
        $penalties = Penalty::select(DB::raw("SUM(amount) as amount"), 'penalty_date as penalty_date')->where('transaction_id', $id)->groupBy(DB::raw("penalty_date"))->where('status', 'UNPAID')->get();
        $payment_penalty = Payment::where('code', $transaction->code)->where('payment_classification', 'PEN')->with('customer')->get();
        $penalty_amount_pay = $payment_penalty->sum('amount');
        $penalty_total = Penalty::where('transaction_id', $id)->where('status', 'UNPAID')->get();
        $penalty_amount_due = $penalty_total->sum('amount');

        // Transfer Fee
        $transfer_fees = TransferFee::where('transaction_id', $transaction->id)->where('status', 'UNPAID')->orderBy('payment_date')->get();
        $transfer_fee_amount_pay = $payment_transfer_fee->sum('amount');
        $transfer_fee_amount_due = $transfer_fees->sum('amount');

        $get_months_pay = AreaDetailLot::with('block', 'block.area_detail')->where('id', $transaction->lot_id)->firstOrFail();


        return view('backend.pages.area.soa', compact('generate_amortization', 'payments', 'customer', 'lot', 'dp', 'res', 'id', 'amortizations', 'penalties', 'remaining_balance', 'regular_amount_pay',
                                                      'penalty_amount_pay', 'penalty_amount_due', 'transfer_fees', 'transfer_fee_amount_due', 'transfer_fee_amount_pay', 'get_months_pay'));
    }

    function noDownpayment($id) {
        $downpayment = new Payment([
            'transaction_id' => $transaction->id,
            'payment_date' => $this->getSameDayNextMonth($startDate, $i)->format('Y-m-d'),
            'payment_classification' => 'MA',
            'amount' => $monthly_amortization,
            'counter' => $i,
            'status' => 'UNPAID',
            'created_user' => Auth::user()->id,
        ]);

        $downpayment->save();
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
        AreaDetailLot::where("id", $id)->update(["purchase_date" => $request->purchase_date, 'end_date' => $request->end_date, 'status' => 'ACTIVE']);
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

        AreaDetailLot::where("id", $id)->update(["monthly_amortization" => $monthly_amortization]);

        for ($i=1; $i <= $diff_in_months; $i++) {
            $monthlyAmort = new MonthlyAmortization([
                'transaction_id' => $transaction->id,
                'payment_date' => $this->getSameDayNextMonth($startDate, $i)->format('Y-m-d'),
                'payment_classification' => 'MA',
                'amount' => $monthly_amortization,
                'balance' => $monthly_amortization,
                'counter' => $i,
                'status' => 'UNPAID',
                'created_user' => Auth::user()->id,
            ]);

            $monthlyAmort->save();
        }

        $trans_fee = new TransferFee([
            'transaction_id' => $transaction->id,
            'payment_date' => Carbon::createFromFormat('Y-m-d', $request->end_date),
            'payment_classification' => 'TF',
            'amount' => $request->transfer_fee,
            'status' => 'UNPAID',
            'created_user' => Auth::user()->id,
        ]);

        $trans_fee->save();

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
                    'amount' => ($monthly_amortization->amount * 0.03),
                    'status' => 'UNPAID',
                ]);
                $penalty->save();
            }
        }
    }

    public function soa_frontend($id)
    {
        $transaction = Transaction::where('lot_id', $id)->firstOrFail();
        $id = $id;
        $customer = Customer::where('id', $transaction->customer_id)->firstOrFail();
        $lot = AreaDetailLot::where('id', $transaction->lot_id)->with('block')->firstOrFail();
        $dp = Payment::where('code', $transaction->code)->where('payment_classification', 'DP')->firstOrFail();
        $res = Payment::where('code', $transaction->code)->where('payment_classification', 'RES')->firstOrFail();
        $payment_transfer_fee = Payment::where('code', $transaction->code)->where('payment_classification', 'TF')->with('customer')->get();
        $amortizations = MonthlyAmortization::where('transaction_id', $transaction->id)->where('status', 'UNPAID')->orderBy('payment_date')->get();
        $generate_amortization = MonthlyAmortization::where('transaction_id', $transaction->id)->exists();
        $remaining_balance = $lot->tcp - $dp->amount - $res->amount;

        // Regular Pay
        $payments = Payment::where('code', $transaction->code)->where('payment_classification', '!=', 'PEN')->with('customer', 'transaction_record', 'amortization')->get();
        $regular_amount_pay = $payments->sum('amount');

        // Penalty Fee
        $penalties = Penalty::select(DB::raw("SUM(amount) as amount"), 'penalty_date as penalty_date')->where('transaction_id', $id)->groupBy(DB::raw("penalty_date"))->where('status', 'UNPAID')->get();
        $payment_penalty = Payment::where('code', $transaction->code)->where('payment_classification', 'PEN')->with('customer')->get();
        $penalty_amount_pay = $payment_penalty->sum('amount');
        $penalty_total = Penalty::where('transaction_id', $id)->where('status', 'UNPAID')->get();
        $penalty_amount_due = $penalty_total->sum('amount');

        // Transfer Fee
        $transfer_fees = TransferFee::where('transaction_id', $transaction->id)->where('status', 'UNPAID')->orderBy('payment_date')->get();
        $transfer_fee_amount_pay = $payment_transfer_fee->sum('amount');
        $transfer_fee_amount_due = $transfer_fees->sum('amount');


        return view('frontend.pages.soa', compact('generate_amortization', 'payments', 'customer', 'lot', 'dp', 'res', 'id', 'amortizations', 'penalties', 'remaining_balance', 'regular_amount_pay', 'penalty_amount_pay', 'penalty_amount_due', 'transfer_fees', 'transfer_fee_amount_due', 'transfer_fee_amount_pay'));
    }

    public function hide_lot(Request $request) {
        Transaction::where('id', $request->id)->update(['hide_status' => $request->status]);
    }
}
