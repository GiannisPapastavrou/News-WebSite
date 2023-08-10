<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WriterController extends Controller
{   


    public function __construct()
    {
        $this->middleware('auth:writer');
    }



    public function showLoginForm()
    {
        return view('login_writer');
    }


    public function welcome()
    {
        return view('welcome_writer');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('writer')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
    
            return redirect()->intended('/homepage');
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    
    }


}
