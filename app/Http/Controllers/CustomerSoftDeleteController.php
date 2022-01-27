<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerSoftDelete;
use Illuminate\Support\Facades\Hash;

class CustomerSoftDeleteController extends Controller
{
    public function index(){
        $form_title = "Customer Registration (SoftDelete demo)";
        $url = url('/database/crud/softdelete/registration');
        $flag = 'create';
        $customer = '';
        $data = compact('customer', 'url', 'form_title', 'flag');
        return view('create_customer')->with($data);
    }

    public function store(Request $request){
        $customer = new CustomerSoftDelete;
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->password = Hash::make($request['password']);
        $customer->address = $request['address'];
        $customer->country = $request['country'];
        $customer->state = $request['state'];
        $customer->dob = $request['dob'];
        $customer->gender = $request['gender'];
        $validator = $customer->save();
        $customers = CustomerSoftDelete::all();
        $msg = 'Success! Customer data saved successfully.';
        if($validator){
            $data = compact('customers');
            return redirect()->route('customer_display')->with('success', 'Success! Customer data saved successfully.');
        } else {
            return redirect()->route('customer_display')->with('failed', 'Failed! Customer data not saved.');
        }
    }

    public function show(Request $request){
        $customers = CustomerSoftDelete::all();
        $data = compact('customers');
        // p($request->session()->all()); exit;
        // p($customers); exit;
        if($request->session()->has('success')){
            $status = "success";
        } else {
            $status = "failed";
        }
        $msg = $request->session()->get($status);
        return view('customers_softdelete_view')->with($status, $msg, $data);
    }

    public function soft_delete($id){
        $customer = CustomerSoftDelete::find($id);
        if(!empty($customer)){
            $customer->delete();
            $msg = "<div class='alert alert-success float-right'>Customer has been moved to trash successfully</div>";
        } else {
            $msg = "<div class='alert alert-danger float-right'>No such customer found with give data</div>";
        }
        $customers = CustomerSoftDelete::all();
        $data = compact('msg', 'customers');
        return view('customers_softdelete_view')->with($data);
    }
}
