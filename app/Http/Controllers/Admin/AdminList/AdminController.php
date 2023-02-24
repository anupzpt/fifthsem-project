<?php

namespace App\Http\Controllers\Admin\AdminList;

use App\Http\Controllers\Controller;
use App\Models\login\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.AdminList.index',['list' => User::where('user_type', 1)->get()]);
    }
}
