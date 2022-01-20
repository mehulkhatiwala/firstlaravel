<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Registration_server_validation extends Controller
{
    public function start(){
        return view('/forms_server');
    }

    public function register(Request $req){
        $req->validate(
            [
                "name" => "required",
                "email" => "required|email",
                "password" => "required"
            ]
        );
        echo "<pre>";
        print_r($req->all());
    }
}
