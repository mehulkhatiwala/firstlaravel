<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    //
    public function index(){
        return view('create_customer');
    }

    public function store(Request $request){
        $request->validate([
            // Place all the server side validation here
            "name" => "required",
            "email" => "required|email",
            "gender" => "required",
            "address" => "required",
            "country" => "required",
            "state" => "required",
            "dob" => "required",
            "password" => "required|confirmed",
            "password_confirmation" => "required",
            "terms" => "required",
        ]);
        $customer = new Customer;
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->gender = $request['gender'];
        $customer->address = $request['address'];
        $customer->country = $request['country'];
        $customer->state = $request['state'];
        $customer->dob = $request['dob'];
        $customer->password = md5($request['password']);
        $customer->save();  // Insert data into DB

        // $customers = Customer::all();
        // echo "<pre>";
        // print_r($customers);

        // Redirect to view all data page
        return redirect('/database/crud/customers');
    }

    public function view(){
        $customers = Customer::all();
        // echo "<pre>";
        // print_r($customers);
        $data = compact('customers');
        return view('customers_view')->with($data);
    }

    public function destroy($id){
        $customer = Customer::find($id);
        if(!empty($customer)){
            $customer->delete();
        }
        return redirect('/database/crud/customers');
    }
}
