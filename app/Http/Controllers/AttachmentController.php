<?php

namespace App\Http\Controllers;

use App\Attachment;
use Auth;
use Illuminate\Http\Request;
use File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

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

    public function store2(Request $request)
    {
        $attachment = $request->validate([
            'attach_file' => 'required',
        ]);

        $image = $request->file('attach_file');
        $new_name = $image->getClientOriginalName();

        $latest = new Attachment([
            'file_name' => $new_name,
            'lot_id' => $request->lot_id,
            'co_borrower_id' => null,
            'type' => 'Sample',
            'status' => 1,
            'created_by' => Auth::user()->id,
        ]);

        $latest->save();

        $file_move = $request->attach_file->move(public_path('attachment/requirement/' . $latest->id), $new_name);

        return redirect()->back()->with('success','Successfully Added');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'attach_file' => 'required',
            'files.*' => 'mimes:csv,txt,xlx,xls,pdf'
        ]);

        if($request->TotalFiles > 0)
        {
            for ($x = 0; $x < $request->TotalFiles; $x++) 
            {
    
                if ($request->hasFile('files'.$x)) 
                {
                    $file = $request->file('files'.$x);
    
                    $path = $file->store('public/files');
                    $name = $file->getClientOriginalName();
    
                    $data = array(
                        'file_name' => $path,
                        'lot_id' => $request->lot_id,
                        'co_borrower_id' => $request->co_borrower_id !== null ? $request->co_borrower_id:'',
                        'type' => $request->type,
                        'status' => 1,
                        'created_by' => Auth::user()->id,
                        'updated_by' => Auth::user()->id,
                    );
            
                    Attachment::create($data);
                }
            }

    
            return response()->json(['success'=>'Ajax Multiple fIle has been uploaded']);
        }
        else
        {
            return response()->json(["message" => "Please try again."]);
        }
    }

    public function show(Request $request)
    {
        if($request->co_borrower_id === null) {
            $attachments = Attachment::where('lot_id', $request->id)->where('type', $request->type)->where('co_borrower_id', 'null')->orderBy('id')->get();
        }
        else {
            $attachments = Attachment::where('lot_id', $request->id)->where('type', $request->type)->where('co_borrower_id', $request->co_borrower_id)->orderBy('id')->get();
        }
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

    public function destroy(Request $request)
    {
        Attachment::where('id', $request->id)->delete();
        Storage::delete($request->file);
    }
}
