<?php

namespace App\Http\Controllers;

use App\Area;
use App\AreaDetail;
use App\AreaDetailLot;
use App\Customer;
use Illuminate\Http\Request;
use Auth;

class AreaDetailController extends Controller
{
    public function index($id)
    {
        $blocks = AreaDetail::where('area_id', $id)->orderBy('block')->with('lot')->get();
        $customers = Customer::where('status', 'ACTIVE')->get();
        $area_id = $id;
        $area = Area::where('id', $id)->firstOrFail();
        return view('backend.pages.area.area_details', compact('blocks', 'area_id', 'customers', 'area'));
    }

    public function store(Request $request)
    {
        $area = $request->validate([
            'area_id' => ['required', 'max:250'],
            'block' => ['required', 'max:250'],
            'lot' => ['required', 'max:250'],
            'area' => ['required', 'max:250'],
            'psqm' => ['required', 'max:250'],
            'tcp' => ['required', 'max:250'],
            'reservation_percent' => ['required', 'max:250'],
            'reservation_fee' => ['required', 'max:250'],
            'balance' => ['required', 'max:250'],
            'monthly_amortization' => ['required', 'max:250'],
            'status' => ['required'],
        ]);

        $request->request->add(['created_user' => Auth::user()->id]);
        $block = AreaDetail::create($request->all());

        for ($a = 0; $a < $request->lot; $a++) {
            $lot = new AreaDetailLot([
                'block_id' => $block->id,
                'lot' => $a + 1,
                'area' => $request->area,
                'psqm' => $request->psqm,
                'tcp' => $request->tcp,
                'reservation_percent' => $request->reservation_percent,
                'reservation_fee' => $request->reservation_fee,
                'balance' => $request->balance,
                'monthly_amortization' => $request->monthly_amortization,
                'status' => 'OPEN',
                'created_user' => Auth::user()->id,
              ]);

              $lot->save();
        }

        return redirect()->back()->with('success','Successfully Added');
    }

    public function edit($id)
    {
        $area = Area::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('area'));
    }

    public function update(Request $request, $id)
    {
        $file = $request->image->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);

        $imageName = $filename.time().'.'.$request->image->extension();  
        $image = $request->image->move(public_path('images/area'), $imageName);

        $requestData = $request->all();
        $requestData['image'] = $imageName;

        Area::find($id)->update($requestData);
        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy($id)
    {
        $destroy = Area::find($id);
        $destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
