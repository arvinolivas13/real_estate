<?php

namespace App\Http\Controllers;

use App\Attachment;
use Auth;
use Illuminate\Http\Request;
use File;
use Carbon\Carbon;

class AttachmentController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $attachment = $request->validate([
            'code' => ['required', 'max:250'],
            'customer_id' => 'required',
            'attachment' => 'required',
        ]);

        $image = $request->file('attachment');
        $new_name = $image->getClientOriginalName();

        $latest = new Attachment([
            'customer_id' => $request->customer_id,
            'code' => $request->code,
            'type' => $request->attachment->extension(),
            'attachment' => $new_name,
            'created_user' => Auth::user()->id,
        ]);

        $latest->save();

        $file_move = $request->attachment->move(public_path('attachment/requirement/' . $latest->id), $new_name);

        return redirect()->back()->with('success','Successfully Added');
    }

    public function show($id)
    {
        $attachments = Attachment::where('customer_id', $id)->orderBy('id')->get();
        return response()->json(compact('attachments'));
    }

    public function edit(Attachment $attachment)
    {
        //
    }

    public function update(Request $request, Attachment $attachment)
    {
        //
    }

    public function destroy(Attachment $attachment)
    {
        //
    }
}
