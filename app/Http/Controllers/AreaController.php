<?php

namespace App\Http\Controllers;

use App\Area;
use App\AreaDetail;
use App\AreaDetailLot;
use Illuminate\Http\Request;
use Mail;
use Auth;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::orderBy('id')->where('status', 'ACTIVE')->get();
        return view('backend.pages.area.area', compact('areas'));
    }

    public function store(Request $request)
    {
        $area = $request->validate([
            'code' => ['required', 'max:250', 'unique:areas'],
            'name' => ['required', 'max:250', 'unique:areas'],
            'description' => ['required'],
            'address' => ['required'],
            'type' => ['required'],
            'image' => ['required'],
            'status' => ['required'],
        ]);

        $request->request->add(['created_user' => Auth::user()->id]);

        $file = $request->image->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);

        $imageName = $filename.time().'.'.$request->image->extension();
        $image = $request->image->move(public_path('images/area'), $imageName);

        $requestData = $request->all();
        $requestData['image'] = $imageName;

        Area::create($requestData);

        return redirect()->back()->with('success','Successfully Added');
    }

    public function html_email() {

        $data = array('name'=>"Virat Gandhi");
        Mail::send('email.sample', $data, function($message) {
            $message->to('arvin.olivas15@gmail.com', 'Tutorials Point')->subject('Laravel HTML Testing Mail');
            $message->from('arvin.olivas15@gmail.com','Virat Gandhi');
        });
        echo "HTML Email Sent. Check your inbox.";
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

    public function add($id)
    {
        $latest_lot = AreaDetailLot::where('block_id', $id)->orderBy('id', 'desc')->first();
        $lot = new AreaDetailLot([
            'block_id' => $latest_lot->block_id,
            'lot' => $latest_lot->lot + 1,
            'area' => $latest_lot->area,
            'psqm' => $latest_lot->psqm,
            'tcp' => $latest_lot->tcp,
            'reservation_percent' => $latest_lot->reservation_percent,
            'reservation_fee' => $latest_lot->reservation_fee,
            'balance' => $latest_lot->balance,
            'monthly_amortization' => $latest_lot->monthly_amortization,
            'no_of_month' => $latest_lot->no_of_month,
            'status' => 'OPEN',
            'created_user' => Auth::user()->id,
          ]);

        $lot->save();

        return redirect()->back()->with('success','Successfully Deleted!');
    }

    public function destroy($id)
    {
        $destroy = AreaDetailLot::where('block_id', $id)->orderBy('id', 'desc')->first();
        $destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
