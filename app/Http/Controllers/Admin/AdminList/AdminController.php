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

    public function edit($id){
        $user = User::find($id);
        return view('admin.AdminList.edit', compact('user',));

    }

    public function update(Request $req, $id){
        $adminDetail = User::find($id);
        $response=$req->all();
        if ($req->hasFile('img_path')) {
            $image = $req->file('img_path');
            $fileName = date('dmY') . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("/uploads"), $fileName);
            $response["img_path"] = $fileName;
        }
        $adminDetail->update($response);
        return redirect()->route('AdminList.index')->with('status', 'Admin Updated Successfully');
    }

    public function create(){
        return view('admin.AdminList.create');
    }

    public function store(Request $req){
        // dd($req->all());
         $req->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'contact' => 'required',
            'user_type' => 'required',
        ]);

        User::create([
            'name' => $req->name,
            'contact' => $req->contact,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'user_type' => $req->user_type,
        ]);
        return redirect()->route('AdminList.index')->with('status', 'Admin Created Successfully');

     
    }
    public function destroy($id){
        $user= User::find($id);
        $user->delete();
        return redirect()->action([AdminController::class, 'index'])->with('status', 'Admin Deleted Successfully');
    }
}
