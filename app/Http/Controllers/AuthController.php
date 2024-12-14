<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        return view('login.credential');
    }
    public function authentication(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('contacts.index');
        }

        return back()->withErrors([
            'email' => 'The credentials provided are incorrect.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('contacts.index');
    }
}
