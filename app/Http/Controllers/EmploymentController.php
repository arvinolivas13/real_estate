<?php

namespace App\Http\Controllers;

use App\Employment;
use Illuminate\Http\Request;

class EmploymentController extends Controller
{
    public function save(Request $request) {
        $output = '';
        $employment = Employment::where('employee_id', $request->employee_id)->count();
        if($employment === 0) {
            $output = 'saved';
            Employment::create($request->all());
        }
        else {
            $output = "updated";
            Employment::where('employee_id', $request->employee_id)->update($request->except('_token'));
        }
        return $output;
    }
}
