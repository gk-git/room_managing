<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicControleer extends Controller
{
    //
    public function index(){
        return view('public');
    }
}
