<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Transaction;

class TransactionController extends Controller
{
    public function reservation(Request $request)
    {
        $area = $request->validate([
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
        $payment = Payment::create($request->all());

        $lot = new Transaction([
            'block_id' => $block->id,
            'lot' => $a + 1,
            'area' => $request->area,
            'psqm' => $request->psqm,
            'tcp' => $request->tcp,
            'reservation_percent' => $request->reservation_percent,
            'reservation_fee' => $request->reservation_fee,
            'balance' => $request->balance,
            'monthly_amortization' => $request->monthly_amortization,
            'status' => 'Open',
            'created_user' => Auth::user()->id,
        ]);

            $lot->save();

        return redirect()->back()->with('success','Successfully Added');
    }
}
