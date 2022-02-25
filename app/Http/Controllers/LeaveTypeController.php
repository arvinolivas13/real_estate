<?php

namespace App\Http\Controllers;

use Auth;
use App\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    
    public function index()
    {
        $leaveType = LeaveType::orderBy('id', 'desc')->get();
        return view('backend.pages.payroll.maintenance.leave_type', compact('leaveType'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'leave_name' => 'required|unique:leave_types'
        ]);

        $request['company_id'] = Auth::user()->company_id;
        $request['created_by'] = Auth::user()->id;

        LeaveType::create($request->all());

        return response()->json(compact('validate'));
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(LeaveType::get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function show(LeaveType $leaveType)
    {
        //
    }

    public function edit($id)
    {
        $leaveType = LeaveType::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('leaveType'));
    }

    public function update(Request $request, $id)
    {
        LeaveType::find($id)->update($request->all());
        return "Record Saved";
    }

    public function destroy($id)
    {
        $leaveType = LeaveType::find($id);
        $leaveType->delete();
        return "Successfully Deleted!";
    }

    public function getData() {
        $leaveType = LeaveType::orderBy('id')->get();
        return response()->json(compact('leaveType'));
    }
}
