<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/gnu', function () {
    return view('gnu');
});

Route::get('/education', function () {
    return view('education');
});

Route::get('/cursojava', function () {
    return view('cursojava');
});

Route::get('/tutorial', function () {
    return view('tutorial');
});

Route::get('/signin', function () {
    return view('signin');
});

Route::post('/signin', function () {
    $token = $request->session()->token();
    $token = csrf_token();
    return view('signin');
});

Route::get('/signup', function () {
    return view('signup');
});



/*Route::middleware(['auth:sanctum', 'verified'])->get('/education', function () {
    return view('education');
})->name('education');*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');




/* 
    EXAMPLE OF EMAIL VERIFIED PROTECTED ROUTE

    Route::get('/instances', function () {
        // verified user redirections
    })->middleware('verified');

*/