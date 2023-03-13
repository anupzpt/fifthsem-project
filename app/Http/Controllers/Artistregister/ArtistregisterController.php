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
        dd($request->all());
        $artistregisters->name = $request->input('name');
        $artistregisters->name = $request->input('email');
        $artistregisters->name = $request->input('contact');
        $artistregisters->name = $request->input('address');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '-' . $extension;
            $file->move('uploads/artist/', $filename);
            $artist->image = $filename;
        } else {
            return $request;
            $artist->image = '';
        }

        $artist->save();

        return view('')->with('artist',$artist);
    }
}
