<?php

namespace App\Http\Controllers\Forget;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\passwordreset\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;


use Mail;

class ForgetController extends Controller
{
    public function forgetPasswordLoad()
    {
        return view('forget-password');
    }

    public function forgetPassword(REquest $request)
    {
        try{
            $user = User::where('email',$request->email)->get();

            if(count($user) > 0){
                $token = Str::random(40);
                $token = URL::to('/');
                $domain.'/reset-password?token='.$token;

                $data['url'] = $url;
                $data['email'] = $request->email;
                $data['title'] = 'Password Reset';
                $data['body'] = 'Please click on below link to reset your password.';
                
                Mail::send('forgetPasswordMail',['date'=>$data],function($message) use ($data){
                    $message->to($data['email'])->subject($data['title']);
                });

                Carbon::now()->format('Y-m-d H:i:s');

                PasswordReset::updateOrCreate(
                    ['email'=>$request->email],
                    [
                        'email' => $request->email,
                        'token' => $token,
                        'created_at' => $dateTime
                    ]
                    );

                    return back()->with('success','Please check your email to reset your');

            }else{
                return back()->with('error','Email is not exists!');
            }
        }catch(\Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }

    public function resetPasswordLoad(Request $req)
    {
        $resetData = PasswordReset::where('token',$request->token)->get();

        if(isset($request->token) && count($resetData) > 0){
            $user = User::where('email',$resetData[0]['email'])->get();
            
            return view('resetPassword',compact('user'));
        }else{
            return view('404');
        }
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::find($request->id);
        $user->password = Hash::make($request->password);
        $user->save();

        PasswordReset::where('email',$user->email)->delete();

        return "<h2>Your password has been reset successfully.</h2>";
    }
}
