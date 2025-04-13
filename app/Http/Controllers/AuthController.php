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

        $this->test_request($request);

        $has_rem = $this->has_remember_me($request);
        

        if(Auth::attempt($credentials,$has_rem)) {
            $request->session()->regenerate();

            session(['user_name' => $request->get('email')]);


            if ($request->ajax()) {
                return response()->json(['redirect' => route('about')]);
            }

            
            return redirect()->intended('about');  
        }


        #error処理
        if ($request->ajax()) {
            return response()->json(['error' => 'Invalid credentials'], 422);
        }
        
        return redirect()->intended('login');
    }



    
    private function test_request(Request $request){
        \Illuminate\Support\Facades\Log::info('Request data:', $request->all());
    }

    private function has_remember_me(Request $request){
        if($request->has('remember-me')){
            return true;
        }
        return false;
    }



    public function auth_logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
