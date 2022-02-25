<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class GlobalController extends Controller
{
    public function series($prefix, $column_name, $model)
    {
        $model = "/App/" . $model;
        if(EmployeeInformation::count() === 0) {
            $request[$column_name] = $prefix.str_pad($model::count() + 1, 7, '0', STR_PAD_LEFT);
        }
        else {
            $request[$column_name] = $prefix.str_pad($model::count() + 1, 7, '0', STR_PAD_LEFT);
        }
    }
}
