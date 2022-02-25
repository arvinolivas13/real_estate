<?php

namespace App\Http\Controllers;

use App\Positions;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    
    public function index()
    {
        $positions = Positions::orderBy('id', 'desc')->get();
        return view('backend.pages.payroll.maintenance.position', compact('positions'));
    }

    public function get() {
        if(request()->ajax()) {
            return datatables()->of(Positions::get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function store(Request $request)
    {
        $position = $request->validate([
            'description' => ['required'],
        ]);

        Positions::create($request->all());

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $positions = Positions::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('positions'));
    }
    
    public function update(Request $request, $id)
    {
        Positions::find($id)->update($request->all());
        return "Record Saved";
    }
    
    public function destroy($id)
    {
        $position_destroy = Positions::find($id);
        $position_destroy->delete();
        return "Successfully Deleted!";
    }
}
