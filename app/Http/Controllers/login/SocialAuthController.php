<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use App\Models\login\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SocialAuthController extends Controller
{
    //login with google part
    // Redirect the user to the Google authentication page.

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle the callback from google
    public function handleCallback()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            // dd($google_user);

            $user = User::where('googleId', $google_user->getId())->first();

            if (!$user) {
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'googleId' => $google_user->getId(),
                    'img_path' => $google_user->getAvatar(),
                ]);

                Auth::login($new_user);
                return redirect()->route('home.index');
            } else {
                Auth::login($user);
                if (Auth::user()->user_type == '1'||Auth::user()->user_type == '2' ) {
                    return redirect('/admin');
                } else {
                    return redirect()->route('home.index');
                }
            }
        } catch (\Throwable $th) {
            dd('something went wrong!' . $th->getMessage());
        }
    }

    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Handle the callback from google
    public function handleFacebookCallback()
    {
        try {
            $facebook_user = Socialite::driver('facebook')->user();
            // dd($google_user);

            $user = User::where('facebookId', $facebook_user->getId())->first();

            if (!$user) {
                $new_user = User::create([
                    'name' => $facebook_user->getName(),
                    'email' => $facebook_user->getEmail(),
                    'googleId' => $facebook_user->getId(),

                ]);

                Auth::login($new_user);

                return redirect()->route('home.index');
            } else {
                Auth::login($user);
                return redirect()->route('home.index');
            }
        } catch (\Throwable $th) {
            dd('something went wrong!' . $th->getMessage());
        }
    }
}
