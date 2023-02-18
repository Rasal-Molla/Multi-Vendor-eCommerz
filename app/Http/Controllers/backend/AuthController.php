<?php

namespace App\Http\Controllers\backend;

use to;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function registration(){

        return view('backend.pages.registration');

    }

    public function process(Request $request){

        $request->validate([

            'name'=>'required',
            'email'=>'required|email|unique:users',
            'phone'=>'required|numeric|regex:/(01)[0-9]{9}/',
            'password'=>'required'
        ]);

        User::create([

            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>bcrypt($request->password),
            'role'=>'admin'

        ]);

        return redirect()->route('admin.login')->with('message', 'Registration done successful!');

    }

    public function login(){

        return view('backend.pages.login');

    }

    public function loginProcess(Request $request){

        $credentials = $request->except('_token');

        if(Auth::attempt($credentials)){
            if(auth()->user()->role == 'admin'){
                return redirect()->route('dashboard')->with('message','Login successful!');
            }else{
                Auth::logout();
                return redirect()->back()->with('error', 'Role not match!');
            }
        }

        return redirect()->back()->with('invalid', 'Invalid credentials!');

    }

    public function adminLogout(){

        Auth::logout();
        return redirect()->route('admin.login')->with('logout','Logout successful!');

    }


    public function forgetPassword(){

        return view('backend.pages.forgetPassword');

    }

    public function forgetPasswordStore(Request $request){

        
        $request->validate([

            'email'=>'required|email|exists:users',

        ]);

        $token = Str::random(60);


        Mail::send('backend.pages.resetPassword', ['token'=>$token], function($message) use($request){

            $message->to($request->email);
            $message->subject('Reset Password');

        });

        return redirect()->back()->with('message', 'We have e-mailed your password reset link!');

    }

    public function showResetPasswordForm($token) {
    
        return view('backend.pages.resetPasswordLink', ['token' => $token]);
    
    }

    public function submitResetPasswordForm(Request $request){
        
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required'
        ]);

        User::where('email', $request->email)
                    ->update(['password' => bcrypt($request->password)]);

        return redirect()->route('admin.login')->with('message', 'Your password has been changed!');
    }

}
