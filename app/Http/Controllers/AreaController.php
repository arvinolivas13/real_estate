<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use Mail;

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

    public function html_email() {
        
        $data = array('name'=>"Virat Gandhi");
        Mail::send('email.sample', $data, function($message) {
            $message->to('arvin.olivas15@gmail.com', 'Tutorials Point')->subject('Laravel HTML Testing Mail');
            $message->from('arvin.olivas15@gmail.com','Virat Gandhi');
        });
        echo "HTML Email Sent. Check your inbox.";
    }

}
