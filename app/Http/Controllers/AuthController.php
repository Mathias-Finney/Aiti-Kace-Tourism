<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function RegisterUser(){
        return view('auth.registerForm');
    }
    

    public function LoginUser(){
        return view('auth.login');
    }

    public function UserRegistration(Request $request){
        $request->validate([
            'username' => ['required', 'min:4', 'unique:users','max:255'],
            'email' => ['required', 'email', 'unique:users','max:255'],
            'password'=> ['required', 'min:3', 'max:255', 'confirmed'],
            'address1'=> ['max:255'],
            'address2'=> ['max:255'],
            'nationality'=> ['max:255'],
            'city'=> ['max:255'],
            'phone'=> ['max:255'],
            'number'=> ['max:255'],
        ]);
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address1 = $request->address1;
        $user->address2 = $request->address2;
        $user->nationality = $request->nationality;
        $user->city = $request->city;
        $user->phone = $request->phone;
        $user->mobile = $request->mobile;
        $res = $user->save();

        if($res){
            return redirect()->back()->with(['status'=>'success', 'message'=>'Registered Successfully. Thank You']);
        }else{
            return back()->with(['status'=>'fail', 'message'=> 'Registration Failed, Please try again']);
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
}
