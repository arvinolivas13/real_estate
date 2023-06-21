<?php

namespace App\Http\Controllers;

use App\TransferFee;
use Illuminate\Http\Request;

class TransferFeeController extends Controller
{
    public function index()
    {
        return view('backend.pages.payment.transfer_fee');
    }
    
    public function get() {
        if(request()->ajax()) {
            return datatables()->of(
                TransferFee::with('transaction')->orderBy('id', 'desc')->get()
            )
            ->addIndexColumn()
            ->make(true);
        }
    }
    
    public function store(Request $request)
    {
        $transfer_fee = $request->validate([
            'amount' => ['required'],
            'status' => ['required']
        ]);


        TransferFee::find($request->id)->update($request->except(['id', '_token']));

        return response()->json(compact('transfer_fee'));
    }
    
    public function edit($id)
    {
        $transfer_fee = TransferFee::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('transfer_fee'));
    }
}
