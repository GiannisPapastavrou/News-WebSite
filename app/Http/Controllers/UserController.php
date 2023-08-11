<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web',['except' => ['logout','welcome']]);
    }




    public function create()
    {
        return view('registration_form');
    }

    public function register(Request $request)
    {
        $this->validate(request(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = new User;
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        return redirect()->to('/login');
    }

    public function showLoginForm()
    {
        return view('login_form');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
    
            return redirect()->intended('/mainpage');
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    
    }


    public function logout(Request $request){

        Auth::guard('writer')->logout();

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        
        return redirect()->route('mainpage');
    }

    
    public function welcome()
    {
        return view('welcome_user');
    }
}
