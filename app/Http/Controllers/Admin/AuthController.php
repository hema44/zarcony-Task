<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function ShowLoginForm ()
    {
        return view('Admin.Auth.login');
    }

    public function Login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);

        $credentials["is_admin"] =1;

        if (Auth::attempt($credentials)){
            return redirect()->route('admin.index');
        }else{
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('AdminLoginForm');
    }
}
