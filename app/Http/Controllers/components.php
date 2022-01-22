<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class components extends Controller
{
    public function myfunc(){
        return view('components');
    }

    public function myfunc2(Request $request){
        $request->validate([
            "name" =>"required",
        ]);

        echo "<pre>";
        // print_r($errors->all());
        print_r($request->all());
    }
}
