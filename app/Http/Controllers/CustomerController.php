<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('id')->get();
        return view('backend.pages.customer.customer', compact('customers'));
    }

    public function store(Request $request)
    {
        $customer = $request->validate([
            'subscriber_no' => ['required', 'max:250', 'unique:customers'],
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
        Customer::create($request->all());

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $customer = Customer::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('customer'));
    }

    public function update_code()
    {
        $customer = Customer::orderBy('id')->get();
        foreach ($customer as $key => $value) {
            # code...
        }
    }

    public function update(Request $request, $id)
    {
        Customer::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $destroy = Customer::find($id);
        Customer::find($id)->update(['subscriber_no' => $destroy->subscriber_no . '(deleted)']);
        $destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
