<?php

namespace App\Http\Controllers;

use App\Payment;
use App\PaymentType;
use App\MonthlyAmortization;
use App\Customer;
use App\Transaction;
use App\Attachment;
use Illuminate\Http\Request;
use Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::orderBy('created_at', 'desc')->with('customer')->limit(500)->orderBy('id', 'desc')->get();
        $customers = Customer::where('status', 'ACTIVE')->get();
        $paymenttypes  = PaymentType::get();
        return view('backend.pages.payment.payment', compact('payments', 'customers', 'paymenttypes'));
    }

    public function store(Request $request)
    {
        $payment = $request->validate([
            'customer_id' => ['required', 'max:250'],
            'code' => ['required'],
            'date'=> ['required'],
            'payment_id' => ['required'],
            'payment_classification' => ['required'],
            'amount' => ['required'],
            'reference_no',
            'counter',
            'or_no',
            'remarks',
        ]);

        $transaction = Transaction::where('code', $request->code)->first();
        $amortization = MonthlyAmortization::where("transaction_id", $transaction->id)->where('counter', $request->counter)->first();

        if($amortization == null) {
            $request->request->add(['created_user' => Auth::user()->id]);
        } else {
            $request->request->add(['created_user' => Auth::user()->id, 'monthly_amortization_id' => $amortization->id]);
        }

        if($request->attach_file != null) {
            // $file = $request->attachment->getClientOriginalName();
            // $filename = pathinfo($file, PATHINFO_FILENAME);

            // $imageName = $filename.time().'.'.$request->attachment->extension();
            // $image = $request->attachment->move(public_path('customer_file/' . $request->customer_id . '-' . $request->lot_id), $imageName);

            $requestData = $request->except(['_token', 'action', 'id']);
            $requestData['attachment'] = '';

            if($request->action === "save") {
                $payment_save = Payment::create($requestData);
                $payment_save_id = $payment_save->id;
            }
            else {
                Payment::find($request->id)->update($requestData);
                $payment_save_id = $request->id;
            }
            
            for ($x = 0; $x < $request->TotalFiles; $x++) 
            {
    
                if ($request->hasFile('files'.$x)) 
                {
                    $file = $request->file('files'.$x);
    
                    $path = $file->store('public/files');
                    $name = $file->getClientOriginalName();
    
                    $data = array(
                        'file_name' => $path,
                        'lot_id' => $request->lot_id,
                        'co_borrower_id' => $payment_save_id,
                        'type' => $request->type,
                        'status' => 1,
                        'created_by' => Auth::user()->id,
                        'updated_by' => Auth::user()->id,
                    );
            
                    Attachment::create($data);
                }
            }

        } else {
            if($request->action === "save") {
                $payment_save = Payment::create($request->except(['_token', 'action', 'id']));
            }
            else {
                $payment_save = Payment::find($request->id)->update($request->except(['_token', 'action', 'id']));
            }
        }

        if($request->payment_classification == 'MA') {
            $current_balance = $amortization->balance - $request->amount;

            // if( $current_balance <= 300) {
            //     MonthlyAmortization::where('id', $amortization->id)->update(['balance' => $current_balance, 'status' => 'PAID']);
            // } else {
            //     MonthlyAmortization::where('id', $amortization->id)->update(['balance' => $current_balance, 'status' => 'UNPAID']);
            // }
            MonthlyAmortization::where('id', $amortization->id)->update(['balance' => $current_balance, 'status' => 'PAID']);
        }

        return response()->json(compact('payment'));
    }

    public function get() {
         if(request()->ajax()) {
             return datatables()->of(
              Payment::with('customer', 'paymenttype', 'process_by', 'attachment', 'amortization')->orderBy('id', 'desc')->limit(500)->get()
            )
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function filter(Request $request) {
        if(request()->ajax()) {
            return datatables()->of(
                Payment::with('customer', 'paymenttype', 'process_by', 'attachment', 'amortization')->whereHAs('customer', function($q) use($request){
                    $q->where('firstname', 'like', "%".$request->firstname."%");
                    // $q->where('middlename', 'like', "%".$request->middlename."%");
                    $q->where('lastname', 'like', "%".$request->lastname."%");
                })->where('code', 'like', '%'.$request->code.'%')->where('payment_id', 'like', '%'.$request->payment_type.'%')->where('payment_classification', 'like', '%'.$request->payment_classification.'%')->orderBy('monthly_amortization_id')->limit(500)->get()
            )
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function edit($id)
    {
        $payment = Payment::with('customer', 'amortization')->where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('payment'));
    }

    public function lotNo($id)
    {
        $lot = Transaction::where('customer_id', $id)->where('hide_status', 0)->orderBy('id')->get();
        return response()->json(compact('lot'));
    }

    public function ma_counter($code)
    {
        $transaction = Transaction::where('code', $code)->first();
        $ma_counters = MonthlyAmortization::where('transaction_id', $transaction->id)->where('status', 'UNPAID')->get();

        return response()->json(compact('ma_counters'));
    }

    public function ma_counter_2($code)
    {
        $transaction = Transaction::where('code', $code)->first();
        $ma_counters = MonthlyAmortization::where('transaction_id', $transaction->id)->get();

        return response()->json(compact('ma_counters'));
    }

    public function update(Request $request, $id)
    {
        Payment::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $amortization_id = Payment::where('id', $id)->firstOrFail()->amortization_id;
        $amortization = MonthlyAmortization::where('id', $amortization_id)->update(['status'=>'UNPAID']);
        
        $destroy = Payment::find($id);
        $destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }

    public function getWithDownpayment(Request $request) {
        $payment = Payment::where('customer_id', $request->id)->where('code', $request->code)->where('payment_classification', 'DP')->get();

        return response()->json(compact('payment'));
    }

    public function getAttachment($id) {
        $attachment = Attachment::where('co_borrower_id', $id)->get();

        return response()->json(compact('attachment'));
    }
}
