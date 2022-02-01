<?php

namespace App\Http\Controllers\Frontend;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('/frontend/contact');
    }
    public function store(Request $request){
        // echo "<pre>";
        // print_r($request->All());
        // p($request->All());
        // Uploading file to server
        $clientName = str_replace(' ', '', ucwords(strtolower($request['name'])));
        $filename = date('YmdHis')."_".$clientName."_contact_us.".$request->file('docs')->getClientOriginalExtension();
        $request->file('docs')->storeAs('public/uploads', $filename);

        $contactus = new Contact;
        $contactus->name = $request['name'];
        $contactus->email = $request['email'];
        $contactus->subject = $request['subject'];
        $contactus->message = $request['message'];
        $contactus->file = $filename;
        $contactus->save();

        return redirect()->route('contact_page');
    }
}
