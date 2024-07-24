<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function loginAdmin(){
        return view('adminLogin');
    }
    public function Authlogin(Request $request){
      
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('home');
        }
        else{
         return   redirect()->back();
        }
    }
    public function logoutAdmin(){
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}
