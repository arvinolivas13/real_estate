<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('id', 'asc')->get();
        return view('backend.pages.customer.customer', compact('customers'));
    }

    public function store(Request $request)
    {
        $customer = $request->validate([
            'subscriber_no' => ['required', 'max:250'],
            'firstname' => ['required'],
            'middlename',
            'lastname' => ['required'],
            'email' => ['required'],
            'address' => ['required'],
            'contact' => ['required'],
            'birthday',
            'occupation',
            'gender' => ['required'],
            'status' => ['required'],
        ]);

        $request->request->add(['created_user' => Auth::user()->id]);

        if($request->action === "save") {
            Customer::create($request->except(['action', 'id']));
        }
        else {
            Customer::find($request->id)->update($request->except(['action', 'id']));
        }

        return response()->json(compact('customer'));
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(
                Customer::orderBy('id', 'desc')->get()
            )
            ->addIndexColumn()
            ->make(true);
        }
    }
    
    public function filter(Request $request) {
        if(request()->ajax()) {
            return datatables()->of(
                Customer::where('subscriber_no', 'like', '%'.$request->code.'%')->where('firstname', 'like', '%'.$request->firstname.'%')->where('middlename', 'like', '%'.$request->middlename.'%')->where('lastname', 'like', '%'.$request->lastname.'%')->orderBy('id', 'desc')->get()
            )
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function edit($id)
    {
        $customer = Customer::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('customer'));
    }

    public function destroy($id)
    {
        $destroy = Customer::find($id);
        // Customer::find($id)->update(['subscriber_no' => $destroy->subscriber_no . '(deleted)']);
        $destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }

    public function get_name(Request $request) {
        $customer = Customer::where('firstname', $request->firstname)->where('middlename', $request->middlename)->where('lastname', $request->lastname)->count();
        return response()->json(compact('customer'));
    }
}
