<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    // Returns the home page of the application
    public function index()
    {
        return view('index');
    }


    //Returns the sign up page and allows a new user to register
    // Sign Up form
    public function create()
    {

        return view('auth.register');
    }

    //validates and register a new user 
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'confirmed'
        ]);

        // dd($request);
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::attempt($request->only('email', 'password'));

        // return redirect()->route('appointment.index');
        return redirect()->route('profile.create');

    }
}
