<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Mail\ContactMail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact');
    }

    public function sendEmail(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'msg' => $request->msg
        ];

        Mail::to('ishankhadka2058@gmail.com')->send(new ContactMail($details));
        return back()->with('message_sent','Your message has been sent Successfully!');
    }
}
