<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function auth_login(Request $request)
    {
        $credentials = $request->validate([
            "email"=> ['required', 'email'],
            "password"=> ['required'],
        ]);

        

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if ($request->ajax()) {
                return response()->json(['redirect' => route('about')]);
            }

            return redirect()->intended('about');  
        }

        if ($request->ajax()) {
            return response()->json(['error' => 'Invalid credentials'], 422);
        }
        
        return redirect()->intended('login');
    }

    public function auth_logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
