<?php

namespace App\Http\Controllers\Forget;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\passwordreset\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use App\Models\login\User;


class ForgetController extends Controller
{
    public function forgetPasswordLoad()
    {
        return view('forget.forget-password');
    }

    public function forgetPassword(Request $request)
    {
        try{
            $user = User::where('email',$request->email)->get();

            if(count($user) > 0){
                
                $token = Str::random(40);
                $url = URL::to('/reset-password/'.$token);
                $domain = '/reset-password?token='.$token;

                $data['url'] = $url;
                $data['email'] = $request->email;
                $data['title'] = 'Password Reset';
                $data['body'] = 'Please click on below link to reset your password.';
                
                Mail::send('forget.forgetPasswordMail',['data'=>$data],function($message) use ($data){
                    $message->to($data['email'])->subject($data['title']);
                });

                $dateTime = Carbon::now()->format('Y-m-d H:i:s');

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

    public function resetPasswordLoad(Request $req,$token)
    {
        $resetData = PasswordReset::where('token',$token)->get();

        if(isset($req->token) && count($resetData) > 0){
            $user = User::where('email',$resetData[0]['email'])->get();
            
            return view('forget.resetPassword',compact('user'));
        }else{
            return view('forget.404');
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
