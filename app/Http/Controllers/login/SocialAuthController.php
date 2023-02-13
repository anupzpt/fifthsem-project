<?php

namespace App\Http\Controllers\login;
use App\Http\Controllers\Controller;
use App\Models\login\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SocialAuthController extends Controller
{
    //
    // Redirect the user to the Google authentication page. 

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback()
    {
        try{
            $google_user = Socialite::driver('google')->user();
            // dd($google_user);

            $user =User::where('googleId', $google_user->getId())->first();

            if(!$user){
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'googleId' => $google_user->getId(),
                ]);

                Auth::login($new_user);

                return redirect()->route('dashboard');
            }
            else{
                Auth::login($user);
                return redirect()->route('dashboard');

            }
        } catch(\Throwable $th) {
            dd('something went wrong!'. $th->getMessage());
        }
       
    }
}
