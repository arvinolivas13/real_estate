<?php

namespace App\Http\Controllers;

use App\Departments;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    
    public function index()
    {
        $departments = Departments::orderBy('id', 'desc')->get();
        return view('backend.pages.payroll.maintenance.department', compact('departments'));
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(Departments::get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $department = $request->validate([
            'description' => ['required'],
        ]);

        Departments::create($request->all());

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $departments = Departments::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('departments'));
    }

    public function update(Request $request, $id)
    {
        Departments::find($id)->update($request->all());
        return "Record Saved";
    }
    
    public function destroy($id)
    {
        $deparment_destroy = Departments::find($id);
        $deparment_destroy->delete();
        return "Successfully Deleted!";
    }
}
