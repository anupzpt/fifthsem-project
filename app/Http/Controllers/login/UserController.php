<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use App\Models\login\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'contact' => 'required',
        ]);

        User::create([
            'name' => $req->name,
            'contact' => $req->contact,
            'email' => $req->email,
            'password' => Hash::make($req->password),

        ]);

        // login user here
        if (Auth::attempt($req->only('email', 'password'))) {
            // dd('log in');
            return redirect()->route('home.index');
        } else {
            // dd('user not found');
            return redirect('register')->withError('Error');
        }
    }

    // login authentication
    public function authentication(request $req)
    {
        // dd($req->all());

        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($req->only('email', 'password'))) {
            // dd('log in');
            if(Auth::user()->user_type == '1'|| Auth::user()->user_type == '2' ){
                return redirect ('/admin');
            }else{
                return redirect()->route('home.index');
            }

        } else {
            // dd('user not found');
            return redirect('login')->withError('Login details are not valid');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home.index');
    }
    public function updateUserData(Request $req)
    {
        // dd($req->all());
        $userInfo = User::find(auth()->user()->id);
        $input = $req->all();
        $userInfo->update($input);
        // session()->put('popupBoxValue','1');
        return redirect()->route('account');
    }
}
