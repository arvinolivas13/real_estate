<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Penalty;
use App\Customer;
use App\Transaction;
use App\MonthlyAmortization;

class PenaltyController extends Controller
{
    public function index()
    {
        $penalties = Penalty::orderBy('id')->with('transaction')->get();
        $customers = Customer::where('status', 'ACTIVE')->get();

        return view('backend.pages.penalty.penalty', compact('penalties', 'customers'));
    }

    public function get_transaction($id) {
        $transaction = Transaction::where('customer_id', $id)->get();
        
        return response()->json(compact('transaction'));
    }

    public function get_amortization($id) {
        $amortization = MonthlyAmortization::where('transaction_id', $id)->get();

        return response()->json(compact('amortization'));
    }

    
    public function store(Request $request)
    {
        $penalty = $request->validate([
            'monthly_amortization_id' => ['required', 'max:250'],
            'transaction_id' => ['required'],
            'penalty_date' => ['required'],
            'payment_classification' => ['required'],
            'amount' => ['required'],
        ]);

        $request->request->add(['created_user' => Auth::user()->id]);

        if($request->action === "save") {
            Penalty::create($request->except(['action', 'id']));
        }
        else {
            Penalty::find($request->id)->update($request->except(['action', 'id']));
        }

        return response()->json(compact('penalty'));
    }
    
    public function get() {
        if(request()->ajax()) {
            return datatables()->of(
                Penalty::with('transaction', 'transaction.customer', 'amortization')->orderBy('id', 'desc')->get()
            )
            ->addIndexColumn()
            ->make(true);
        }
    }
    
    public function edit($id)
    {
        $penalty = Penalty::with('transaction', 'transaction.customer', 'amortization')->where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('penalty'));
    }

    public function destroy($id)
    {
        $destroy = Penalty::find($id);
        $destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
