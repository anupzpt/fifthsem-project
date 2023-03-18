<?php

namespace App\Http\Controllers\Admin\ArtistList;

use App\Http\Controllers\Controller;
use App\Models\Artistregister\Artistregister;
use App\Models\login\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtistController extends Controller
{
    public function index(){
        return view('admin.ArtistList.index',['list' => User::where('user_type', 2)->get()]);
    }

    public function request(){
        return view('admin.ArtistList.artistRequest', ['list' => Artistregister::all()], ['value' => User::all()]);
    }

    public function update($id){
        $user = User::find($id);
        $user -> user_type = '2';
        $artist = Artistregister::find($id);
        $artist-> user_type = '2';
        $user-> save();
        $artist->save();

        return redirect()->route('artistRequest')->with('status', 'Artist approved');

        
    }
    public function delete($id){
        $request = Artistregister::find($id);
        $request-> delete();
        return redirect()->route('artistRequest')->with('status', 'Request Deleted');
    }
}
