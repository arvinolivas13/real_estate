<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Transaction;
use App\MonthlyAmortization;
use App\AreaDetailLot;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $transaction = Transaction::with('lot', 'lot.block')->where('status', 'active')->get();
        return view('backend.settings.settings', compact('transaction'));
    }

    public function get($id) {
        $transaction = Transaction::with('lot', 'lot.block')->where('id', $id)->first();
        $amortization = MonthlyAmortization::where('transaction_id', $id)->orderBy('counter', 'asc')->get();
        $lot = AreaDetailLot::where('id', $transaction->lot_id)->first();

        $transaction_id = $id;
        $lot_id = $transaction->lot_id;

        return response()->json(compact('transaction', 'amortization', 'lot', 'transaction_id', 'lot_id'));
    }

    public function destroy($transaction_id, $lot_id) {
        MonthlyAmortization::where('transaction_id', $transaction_id)->delete();
        Transaction::where('id', $transaction_id)->delete();

        AreaDetailLot::where('id', $lot_id)->update(['reservation_date'=>null,'purchase_date'=>null,'end_date'=>null,'status'=>'OPEN']);

        return response()->json();
    }
    public function close_amortization(Request $request, $id) {
        $ammort = MonthlyAmortization::where('id', $id)->first();

        MonthlyAmortization::where('id', $id)->update(['balance'=>$ammort->amount, 'status'=>'UNPAID']);
        Payment::where('monthly_amortization_id', $id)->delete();
        
        $balance = $ammort->amount;
        return response()->json(compact('balance'));
    }
}
