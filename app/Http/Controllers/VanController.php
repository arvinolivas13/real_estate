<?php

namespace App\Http\Controllers;

use App\Van;
use Illuminate\Http\Request;

class VanController extends Controller
{
    public function index()
    {
        return view('backend.pages.van.van');
    }

    public function schedule()
    {
        return view('backend.pages.van.van_schedule');
    }
}
