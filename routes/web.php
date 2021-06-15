<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\UserLogs;
use App\Http\Controllers\Municipalities;
use App\Http\Controllers\Geolocations;


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

Route::middleware(['auth:sanctum'])->get('/user/mapview', function () {
    return view('geoanalysis.mapview');
})->name('geoanalysis.mapview');

Route::middleware(['auth:sanctum'])->get('/user/mapviewcopy', function () {
    return view('geoanalysis.mapviewcopy');
})->name('geoanalysis.mapviewcopy');

Route::middleware(['auth:sanctum'])->post('/login_logs', [Geolocations::class, 'index'])->name('geolocations.all');
Route::middleware(['auth:sanctum'])->get('/login_logs', function() {
    return view('login_logs');
})->name('login_logs');
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