<?php

namespace App\Http\Controllers;

use Auth;
use App\CompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{

    public function index()
    {
        return view('backend.pages.payroll.transaction.company_profile.index');
    }

    public function store(Request $request) {
        
        $validate = $request->validate([
            'company_name' => 'required',
            'email' => 'required|unique:company_profiles|email'
        ]);

        $last_id = CompanyProfile::latest('created_at')->first()->id;

        if($request->image !== null) {
            $request['company_logo'] = $this->uploadFile($request->image, 'images/company/', ($last_id + 1));
        }
        else {
            $request['company_logo'] = "default.png";
        }

        $request['created_by'] = Auth::user()->id;
        
        $company = CompanyProfile::create($request->all());
        $last_record = array("id" => $company->id);

        return response()->json(compact('validate', 'last_record'));
    }

    public function uploadFile($image, $path, $file_name) {
        $extension = '';
        $image = $image;
        $image_explode = explode('base64,', $image);
        $image = $image_explode[1];

        $image = str_replace(' ', '+', $image);
        $imageName = $file_name.'.'.($image_explode[0] === "data:image/jpeg;"?'jpg':'png');
        \File::put(public_path($path).$imageName, base64_decode($image));

        return $imageName;
    }
    
    public function get()
    {
        if(request()->ajax()) {
            return datatables()->of(CompanyProfile::get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function edit($id)
    {
        $company = CompanyProfile::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('company'));
    }
    
    public function update(Request $request, $id)
    {
        if($request->image !== null) {
            $request['company_logo'] = $this->uploadFile($request->image, 'images/company/', date('Ymdhis'));
        }
        CompanyProfile::find($id)->update($request->all());
        return 'Successfully Updated!';
    }
    
}
