<?php

namespace App\Http\Controllers;

use Auth;
use App\CoBorrower;
use Illuminate\Http\Request;

class CoBorrowerController extends Controller
{
    public function get($id) {
        if(request()->ajax()) {
            return datatables()->of(
                CoBorrower::where('lot_id', $id)->get()
            )
            ->addIndexColumn()
            ->make(true);
        }
    }
    
    public function store(Request $request)
    {
        $coborrower = $request->validate([
            'name' => ['required']
        ]);

        $request->request->add(['created_by' => Auth::user()->id]);
        $request->request->add(['updated_by' => Auth::user()->id]);

        CoBorrower::create($request->all());

        return response()->json(compact('coborrower'));
    }
}
