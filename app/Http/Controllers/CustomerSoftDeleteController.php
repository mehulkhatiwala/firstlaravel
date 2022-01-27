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
        if($validator){
            $data = compact('customers');
            return redirect()->route('customer_except_trashed_display')->with('success', 'Success! Customer data saved successfully.');
        } else {
            return redirect()->route('customer_except_trashed_display')->with('failed', 'Failed! Customer data not saved.');
        }
    }

    public function show_except_trashed(Request $request){
        // $customers = CustomerSoftDelete::all();
        $customers = CustomerSoftDelete::all();
        $data = compact('customers');
        // p($request->session()->all()); exit;
        // p($customers); exit;
        if($request->session()->has('success')){
            $status = "success";
        } elseif($request->session()->has('failed')) {
            $status = "failed";
        } elseif($request->session()->has('warning')) {
            $status = "warning";
        } else {
            $status = "";
        }
        $msg = $request->session()->get($status);
        $data = compact('customers', 'msg', 'status');
        return view('customers_softdelete_view')->with($data);
    }

    public function show_trashed_only(Request $request){
        // $customers = CustomerSoftDelete::all();
        $customers = CustomerSoftDelete::onlyTrashed()->get();
        $data = compact('customers');
        // p($request->session()->all()); exit;
        // print_r($customers->all()); exit;
        if($request->session()->has('success')){
            $status = "success";
        } elseif($request->session()->has('failed')) {
            $status = "failed";
        } else {
            $status = "";
        }
        $msg = $request->session()->get($status);
        $data = compact('customers', 'msg', 'status');
        return view('customers_softdelete_trash')->with($data);
    }

    public function soft_delete($id){
        $customer = CustomerSoftDelete::find($id);
        if(!empty($customer)){
            $customer->status = 0;
            $customer->save();
            $customer->delete();

            $status = "success";
            $msg = "Customer has been moved to trash successfully";
        } else {
            $status = "failed";
            $msg = "No such customer found with give data";
        }
        $customers = CustomerSoftDelete::all();
        $data = compact('customers', 'status', 'msg');
        return view('customers_softdelete_view')->with($data);
    }

    public function force_delete($id){
        $customer = CustomerSoftDelete::withTrashed()->find($id);
        $status = $msg = '';
        if(!is_null($customer)){
            $validator = $customer->forceDelete();
            if($validator){
                $status = "success";
                $msg = "Customer has been removed permanently";
            } else {
                $status = "failed";
                $msg = "Unable to force-delete customer";
            }
        } else {
            $status = 'warning';
            $msg = "Invalid id provided";
        }
        return redirect()->route('customer_except_trashed_display')->with($status, $msg);
    }

    public function restore($id){
        $customer = CustomerSoftDelete::withTrashed()->find($id);
        $status = $msg = '';
        if(!is_null($customer)){
            $validator = $customer->restore();
            if($validator){
                $status = "success";
                $msg = "Customer has been restore successfully";
            } else {
                $status = "failed";
                $msg = "Unable to restore customer";
            }
        } else {
            $status = 'warning';
            $msg = "Invalid id provided";
        }
        return redirect()->route('customer_except_trashed_display')->with($status, $msg);
    }
}
