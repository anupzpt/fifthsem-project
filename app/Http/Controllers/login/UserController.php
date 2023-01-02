<?php

namespace App\Http\Controllers\login;
use App\Http\Controllers\Controller;
Use App\Models\login\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function loginIndex()
    {
        return view('login.login');
    }

    public function registerIndex()
    {
        return view('login.register');
    }

    public function save(request $req)
    {
        // dd($req->all());
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'contact' => 'required',
        ]);

        User::create([
            'name' => $req->name,
            'contact' => $req->contact,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'user_type' =>$req->user_type,
        ]);
        return redirect()->route('login');
    }
}
