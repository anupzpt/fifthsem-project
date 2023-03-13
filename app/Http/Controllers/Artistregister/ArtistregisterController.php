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
            'image' => 'required'

        ]);

        $artist = new Artistregister;
        $artist->name = $request->name;
        $artist->email = $request->email;
        $artist->contact = $request->contact;
        $artist->address = $request->address;
        // dd($request->all());
        
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $fileName = date('dmY') . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("/uploads"), $fileName);
            $artist->image = $fileName;
        }
        
        
        $artist->save();

        return redirect()->route('artist-register')->with('status', 'Artist Created Successfully');


       
    }
}
