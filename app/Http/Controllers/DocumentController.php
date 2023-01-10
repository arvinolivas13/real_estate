<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class DocumentController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('status', 'active')->with('customer')->get();
        return view('backend.pages.document.contract', compact('transactions'));
    }

    public function show($id)
    {
        $transaction = Transaction::where('id', $id)->with('customer', 'lot')->firstOrFail();
        return response()->json(compact('transaction'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
