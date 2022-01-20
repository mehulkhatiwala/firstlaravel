<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicController extends Controller
{
    public function start(){
        return view('basic_controller');
    }

}
