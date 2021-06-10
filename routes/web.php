<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\UserLogs;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/user/mapview', function () {
    return view('geoanalysis.mapview');
})->name('geoanalysis.mapview');

Route::middleware(['auth:sanctum', 'verified'])->get('/login_logs', [UserLogs::class, 'index'])->name('userlogs.all');

Route::middleware(['auth:sanctum', 'verified'])->get('/municipalities', [UserLogs::class, 'test'])->name('userlogs.test');

Route::get('/test', function () {
    return view('test');
});

//Route::get('/yikes',  


/* 
    EXAMPLE OF EMAIL VERIFIED PROTECTED ROUTE

    Route::get('/instances', function () {
        // verified user redirections
    })->middleware('verified');

*/