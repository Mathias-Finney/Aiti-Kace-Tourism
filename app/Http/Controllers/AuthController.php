<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\verification;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function RegisterUser(){
        return view('auth.registerForm');
    }
    

    public function LoginUser(){
        return view('auth.login');
    }

    public function UserRegistration(Request $request){
        $data = $request->validate([
            'username' => ['required', 'min:4', 'unique:users','max:255'],
            'email' => ['required', 'email', 'unique:users','max:255'],
            'password'=> ['required', 'min:3', 'max:255', 'confirmed'],
            'profile_image'=> ['max:1024', 'image', 'nullable'],

            
        ]);
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if($request->hasFile('profile_image'))
        {
            $userImage = $request->file('profile_image');
            $path = $userImage->store("users", 'images');
            $user->profile_image = $path;
        }
        $user->remember_token = Str::random(40);
        $user->save();

        Mail::to($user->email)->send(new verification($user->remember_token,$data));

        if($request){
            return redirect()->back()->with(['status'=>'success', 'message'=>'Email verification sent. Thank You']);
        }else{
            return back()->with(['status'=>'danger', 'message'=> 'Registration Failed, Please try again']);
        }
        

    }
    public function UserLogin(Request $request){
        //dd($request);
        $request->validate([
            'email' => ['required', 'email','max:255'],
            'password'=> ['required', 'min:3', 'max:255'],
        ]);

        $credentials = $request->only('email','password');
        //dd($credentials);

        //if(Auth::attempt($request)){
           // return redirect()->route('home');
        //}
        //return 'Failure';

         if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->email_verified_at > date('Y-m-d H:i:s') || Auth::user()->email_verified_at == '')
            {
                $request->session()->invalidate();   
                return redirect(route('auth.login'))->with([
                    'status' => 'info', 'message' => 'You have not verified your email'
                ]);      
            }
            return redirect(route('home'))->with(['status'=>'success', 'message'=>'Login succesfully.']);
        } else {
            return redirect()->back()->withInput()->with(['status'=> 'danger', 'message' => 'Email/password is incorrect']);
        } 
    }

    public function logoutUser(Request $request){
        $request->session()->invalidate();
        return redirect(route('home'))->with([
            'status' => 'info', 'message' => 'Logout successful'
        ]);
    }
    public function verify($token)
    {
        $user = User::where('remember_token', '=' ,$token)->first();
        if(!empty($user))
        {
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->remember_token = Str::random(40);
            $user->save();

            return redirect(route('auth.login'))->with(['status'=> 'success','message'=>'Your account has been successfully verified']);
        }
        else
        {
            User::destroy($user->id);
            abort(404);
        }
    }
}
