<?php

namespace App\Http\Controllers\Admin;
use App;
use Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller{


    // login section
    public function showLogin(){
        return view('admin/login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/admin');
        }

        $message = "Please check your data and try again";
        session()->flash('feedback',$message);
        return redirect('/login');
    }


    public function logout (Request $request) {
        Auth::logout();
        return redirect('/login');
    }

    public function changePassword(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        if(Hash::check($request->current_password, Auth::user()->password)){
            $newPassword = Hash::make($request->password);
            Auth::user()->password = $newPassword;
            Auth::user()->save();
            return redirect()->back()->with('feedback', 'password has been updated successfully');
        }
        return redirect()->back()->with('feedback', 'the current password, is wrong !');
    }


}