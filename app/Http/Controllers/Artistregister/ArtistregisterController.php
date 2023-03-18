<?php

namespace App\Http\Controllers\Artistregister;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artistregister\Artistregister;

class ArtistregisterController extends Controller
{
    public function artistreg()
    {
        return view('');
    }

    public function artist(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:artistregisters|email',
            'contact' => 'required',
            'address' => 'required',
            

        ]);

        $artist = new Artistregister;
        $artist->name = $request->name;
        $artist->email = $request->email;
        $artist->contact = $request->contact;
        $artist->address = $request->address;
        $artist->id = $request->id;
        $artist->user_type = $request->user_type;
        $artist->save();

        return redirect()->route('artist-register')->with('status', 'Applied sucessfully!!! Try login after 24 hours');


       
    }
}
