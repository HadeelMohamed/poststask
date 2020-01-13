<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;
use Mail;

class ContactUsController extends Controller
{

    public function index()
    {
        return view('contactus');
    }

    public function sendcontactusmail(Request $request)
    {
        ContactUs::create($request->all());

        $data = array('name'=> $request->name,
            'subject'=> 'contact us'
        );
        Mail::send('emails.thankyou', $data, function($message) use ($request) {
            $message->to($request->email, $request->name)->subject
            ('Thank you');

        });
        return redirect()->to('/')
            ->with('success','Message Sent  successfully.');
    }
}
