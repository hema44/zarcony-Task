<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function ShowLoginForm()
    {
        return view('login');
    }

    public function Login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)){
            return redirect()->back()->withErrors(['error-credentials' => 'user email or password is error']);
        }

        return redirect('/');
    }

    public function Register(Request $request){

        $credentials = $request->validate([
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'name' => 'required',
            'password' => 'required|min:6'
        ]);

        $user =User::create($credentials);

        Auth::login($user);

        return redirect('/');

    }

    public function logout(){
        Auth::logout();

        return redirect()->route("home");
    }
}
