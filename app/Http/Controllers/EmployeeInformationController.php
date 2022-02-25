<?php

namespace App\Http\Controllers;

use App\Traits\GlobalFunction;
use App\EmployeeInformation;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Classes;
use App\Departments;
use App\Positions;
use App\LeaveType;

class EmployeeInformationController extends Controller
{
    use GlobalFunction;

    public function index()
    {
        $classes = Classes::get();
        $department = Departments::get();
        $position = Positions::get();
        $leave_type = LeaveType::get();
        return view('backend.pages.payroll.transaction.employee_information.index', compact('classes', 'position', 'department', 'leave_type'));
    }

    public function store(Request $request)
    {
        
        $validate = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'gender' => 'required',
            'phone1' => 'required',
            'street_1' => 'required',
            'barangay_1' => 'required',
            'city_1' => 'required',
            'province_1' => 'required',
            'country_1' => 'required',
            'zip_1' => 'required',
            'email' => 'required|unique:employees'
        ]);

       
        $request['employee_no'] = $this->series('EMP', 'EmployeeInformation');

        if($request->image !== null) {
            $request['profile_img'] = $this->uploadFile($request->image, 'images/employee/', $request['employee_no']);
        }
        else {
            $request['profile_img'] = "default.jpg";
        }
 
        $request['company_id'] = Auth::user()->company_id;
        $request['created_by'] = Auth::user()->id;

        $employee = EmployeeInformation::create($request->all());
        $last_record = array("employee_no" => $employee->employee_no);

        return response()->json(compact('validate', 'last_record'));
    }

    public function get()
    {
        if(request()->ajax()) {
            return datatables()->of(EmployeeInformation::select("id", "employee_no", DB::raw("CONCAT(employees.firstname,' ',employees.lastname) as full_name"), "email")->get())
            ->addIndexColumn()
            ->make(true);
        }
    }

    
    public function sample()
    {
        $collection = EmployeeInformation::get();
        $keyed = $collection->mapWithKeys(function($item) {
            return [md5("hello".rand(5, 15)) => $item['email']];
        });
        return $keyed->all();
    }

    public function edit($id)
    {
        $employee = EmployeeInformation::with('employment_tab')->with('leave_tab')->where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('employee'));
    }

    public function update(Request $request, $id)
    {
        if($request->image !== null) {
            $request['profile_img'] = $this->uploadFile($request->image, 'images/employee/', $request['employee_no']);
        }
        EmployeeInformation::find($id)->update($request->all());
        return 'Successfully Updated!';
    }

    public function destroy($id)
    {
        $employeeinformation_destroy = EmployeeInformation::find($id);
        $employeeinformation_destroy->delete();
        return "Successfully Deleted!";
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
}
