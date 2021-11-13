<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    //Returns login form
    public function index(){
        return view('auth.login');
    }


    //Validates login credentials
    public function login(Request $request){

        
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);


        //Check for wrong Password
        if (!Auth::attempt($request->only('email', 'password'), $request->remember)){
            return redirect()->route('login')->with('message', 'Wrong password or email, Try Again');
        }

        return redirect()->intended('appointment');

    }
}
