<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Transaction;
use App\AreaDetailLot;
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

        AreaDetailLot::where("id", $request->lot_id)->update(["status" => "RESERVED"]);
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
        $payments = Payment::orderBy('id')->with('customer')->get();
        $customers = Customer::where('status', 'ACTIVE')->get();
        return view('backend.pages.area.soa', compact('payments', 'customers'));
    }
}
