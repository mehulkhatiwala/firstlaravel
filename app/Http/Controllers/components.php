<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class components extends Controller
{
    public function myfunc(){
        return view('components');
    }

    public function myfunc2(Request $request){
        
        echo "<pre>";
        print_r($request->all());
    }
}
