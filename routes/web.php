<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GController;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/about', function () {
    return view('about');
})->middleware('auth')->name('about');



#auth系

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/authlogin', [AuthController::class, 'auth_login'])->name('auth_login');

Route::post('/logout', [AuthController::class, 'auth_logout'])->name('auth_logout');

Route::get('login/google', [GController::class,'redirectToGoogle'])->name('glogin');

Route::get('login/google/callback', [GController::class,'handleGoogleCallback'])->name('gclogin');
