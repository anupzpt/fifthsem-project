<?php

namespace App\Http\Controllers;

use App\Models\Message\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function send_message(Request $req){
        $req->validate([
            'user_firstname' => 'required',
            'user_lastname' => 'required',
            'user_email' => 'required',
            'user_message' => 'required'
        ]);
        Message::Create([
            'user_firstname' => $req->user_firstname,
            'user_lastname' => $req->user_lastname,
            'user_email' => $req->user_email,
            'user_subject' => $req->user_subject,
            'user_message' => $req->user_message
        ]);
        return back()->with('success', 'Message sent successfully.');
    }


    public function view_message(){
        $messageData = Message::all();
        return view('message',['messages'=>$messageData]);
    }
}

