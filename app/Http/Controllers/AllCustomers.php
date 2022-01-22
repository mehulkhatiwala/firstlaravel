<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllCustomers extends Controller
{
    //
    public function index() {
        return view('view_all_customers');
    }
}
