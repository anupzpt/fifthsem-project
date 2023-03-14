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
            'artistImage' => 'required'

        ]);

        $artist = new Artistregister;
        $artist->name = $request->name;
        $artist->email = $request->email;
        $artist->contact = $request->contact;
        $artist->address = $request->address;
        
        if ($request->hasFile('artistImage')) {

            $image = $request->file('artistImage');
            $fileName = date('dmY') . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("/uploads"), $fileName);
            $artist->image = $fileName;
        }      
        $artist->save();

        return redirect()->route('artist-register')->with('status', 'Artist Created Successfully');


       
    }
}
