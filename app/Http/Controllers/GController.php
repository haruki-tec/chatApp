<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\SocialiteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(Request $request)
    {
        try {
        $guser = Socialite::driver('google')->user();
        $user = User::where('email', $guser->email)->first();
        if ($user == null) {
            $user = $this->createUserByGoogle($guser);
        }

        Auth::login($user);
        return redirect('/about');
        } catch (\Exception $e) {
            return redirect('/login');
        }
    }

    public function createUserByGoogle($gUser){
        try{
            $user = User::create([
                'name'=> $gUser->name,
                'email'=> $gUser->email,
                'password'=> \Illuminate\Support\Facades\Hash::make(uniqid(mt_rand(), true)),
            ]);
            return $user;
        } 
        catch (\Exception $e) {
            Log::error('User creation error: ' . $e->getMessage());
            throw $e;
        }
    }
}
