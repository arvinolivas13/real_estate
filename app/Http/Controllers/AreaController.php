<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use Mail;
use Auth;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::orderBy('id')->get();
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

    public function destroy($id)
    {
        $destroy = Area::find($id);
        $destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
