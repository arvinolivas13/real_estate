<?php

namespace App\Http\Controllers;

use App\Payment;
use App\PaymentType;
use App\Customer;
use App\Transaction;
use Illuminate\Http\Request;
use Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::orderBy('id')->with('customer')->get();
        $customers = Customer::where('status', 'ACTIVE')->get();
        $paymenttypes  = PaymentType::get();
        return view('backend.pages.payment.payment', compact('payments', 'customers', 'paymenttypes'));
    }

    public function store(Request $request)
    {
        $Payment = $request->validate([
            'customer_id' => ['required', 'max:250'],
            'code' => ['required'],
            'date'=> ['required'],
            'payment_id' => ['required'],
            'payment_classification' => ['required'],
            'amount' => ['required'],
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



        if($request->payment_classification == 'DP') {

        }

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $Payment = Payment::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('Payment'));
    }

    public function lotNo($id)
    {
        $lot = Transaction::where('customer_id', $id)->orderBy('id')->get();
        return response()->json(compact('lot'));
    }

    public function update(Request $request, $id)
    {
        Payment::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $destroy = Payment::find($id);
        $destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
