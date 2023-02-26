<?php

namespace App\Http\Controllers\Admin\UserList;
use App\Http\Controllers\Controller;
use App\Models\login\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserListController extends Controller
{
    //
    public function index(){
        return view('admin.UserList.index',['list' => User::where('user_type', 0)->get()]);
    }
}
