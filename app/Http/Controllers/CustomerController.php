<?php

namespace App\Http\Controllers;

//Error checking enable
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    //
    public function index(){
        $form_title = "Customer Registration";
        $url = url('/database/crud/registration');
        $flag = 'create';
        $customer = '';
        $data = compact('customer', 'url', 'form_title', 'flag');
        return view('create_customer')->with($data);
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

    public function edit($id, Request $request){
        $customer = Customer::find($id);
        // p($customer); die;
        if(is_null($customer)){
            // ID not found
            return redirect('/database/crud/customers');
        } else {
            // ID found
            $form_title = "Update Customer";
            $url = url('/database/crud/customers/update').'/'.$id;
            $flag = 'update';
            $data = compact('customer', 'form_title', 'url', 'flag');
            // echo $customer->address;
            // p($data); die;
            return view('create_customer')->with($data);
        }
    }

    public function update($id, Request $request){
        $request->validate([
            "name" => "required",
            // "email" => "required",
            "gender" => "required",
            "address" => "required",
            "country" => "required",
            "state" => "required",
            "dob" => "required",
            // "password" => "required|confirmed",
            // "password_confirmation" => "required",
            "terms" => "required",
        ]);

        $customer = Customer::find($id);
        if(!is_null($customer)){
            $customer->name = $request['name'];
            // $customer->email = $request['email'];
            $customer->gender = $request['gender'];
            $customer->address = $request['address'];
            $customer->country = $request['country'];
            $customer->state = $request['state'];
            $customer->dob = $request['dob'];
            $customer->password = md5($request['password']);
            $customer->save();
        }
        return redirect('/database/crud/customers');
    }

    public function session_management(){
        $key_value = '';
        $delete_value = '';
        $error = '';
        $data = compact('key_value', 'error', 'delete_value');
        return view('session_form')->with($data);
    }

    public function session_add(Request $request){
        // $request->validate([
        //     "add_key" => "required",
        //     "value" => "required",
        // ]);
        // p($request->all());
        // die();

        if(isset($request['add_key']) && !empty($request['add_key']) && isset($request['key_value']) && !empty($request['key_value'])){
            $request->session()->put($request['add_key'], $request['key_value']); 
            
            // Getting all session data
            // $session = session()->all();
            // $data = compact('session');
            return redirect('view_session_data');
        } elseif (isset($request['search_key']) && !empty($request['search_key'])){
            // echo "my session data";
            if($request->session()->has($request['search_key'])){
                $key_value = $request->session()->get($request['search_key']);
                // echo $key_value;

            }else {
                $key_value = "Given key did not matched";
            }
            $error = '';
            $delete_value = '';
            $data = compact('key_value', 'error', 'delete_value');
            return view('session_form')->with($data);
        } elseif (isset($request['delete_key']) && !empty($request['delete_key'])) {
            if($request->session()->has($request['delete_key'])){
                $request->session()->forget($request['delete_key']);
                $delete_value = "<div class='alert alert-danger text-center'>Given session key deleted successfully</div>";
            }else {
                $delete_value = "<div class='alert alert-info text-center'>Given key did not matched</div>";
            }
            $error = '';
            $key_value = '';
            $data = compact('key_value', 'error', 'delete_value');
            return view('session_form')->with($data);
        } else {
            $key_value = '';
            $delete_value = '';
            $error = "<div class='alert alert-danger text-center'>Please enter value for appropriate action you want to perform</div>";
            $data = compact('key_value', 'error', 'delete_value');
            return view('session_form')->with($data);
        }
    }
}
