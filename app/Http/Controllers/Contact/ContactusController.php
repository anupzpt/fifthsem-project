<?php

namespace App\Http\Controllers\Contact;

use Illuminate\Http\Request;
use App\Models\Mail\ContactMail;
use App\Http\Controllers\Controller;
use Mail;


class ContactusController extends Controller
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

        Mail::to('artihc82@gmail.com')->send(new ContactMail($details));
        return back()->with('message_sent','Your message has been sent Successfully!');
    }
}
