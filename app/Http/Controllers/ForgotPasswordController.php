<?php

namespace App\Http\Controllers;

use App\Models\ResetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('backend.auth.emailx');
    }
    public function forgotPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $token = STR::random(64);
        $forgotPassword = new ResetPassword;
        $forgotPassword->email = $request->email;
        $forgotPassword->token = $token;
        $forgotPassword->save();
        Mail::send('backend.auth.reset_password',['token' => $token], function ($message) use ($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return back()->with('success','We have sent an email to reset password to your email address');
    }
    public function resetPassword($token)
    {
        return view('backend.auth.reset',compact('token'));
    }
    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'password' => [
                'required',
                'string',
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
            'password_confirmation' => ['required'],
            'email' => 'required|email'
        ]);
        $updatePassword = DB::table('reset_passwords')
                        ->where([
                            'email' => $request->email,
                            'token' => $request->token
                        ])->first();
        if(!$updatePassword){
            return back()->with('error-email','Invalid email address or token');
        }
        User::where('email',$request->email)
            ->update(['password' => Hash::make($request->password)]);
        DB::table('reset_passwords')->where(['email' => $request->email])->delete();
        return redirect()->to(route('login'))->with('success','Password reset success');
    }
}
