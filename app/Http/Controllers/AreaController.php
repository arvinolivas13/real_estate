<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        return view('backend.pages.area.area');
    }

    public function customer_record()
    {
        return view('backend.pages.area.customer_record');
    }

}
