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

Route::middleware(['auth:sanctum', 'is_admin'])->get('/user/mapview', function () {
    return view('geoanalysis.mapview');
})->name('geoanalysis.mapview');


// UserLogs data queries.
Route::middleware(['auth:sanctum', 'is_admin']) ->get('/login_logs/{test}'   , [UserLogs::class, 'index'])       ->name('userlogs.all'           );
Route::middleware(['auth:sanctum', 'is_admin']) ->get('/list_users'          , [UserLogs::class, 'list_users'])  ->name('userlogs.userList'      );
Route::middleware(['auth:sanctum', 'verified']) ->get('/login_logs'          , [UserLogs::class, 'user_logs'])   ->name('userlogs.user'          );


// Municipalities data queries.
Route::middleware(['auth:sanctum', 'verified'])->get('/municipalities'      , [Municipalities::class, 'index']) ->name('municipalities.all'     );
Route::middleware(['auth:sanctum', 'verified'])->get('/despo_muni'          , [Municipalities::class, 'despo']) ->name('municipalities.despo'   );
Route::middleware(['auth:sanctum', 'verified'])->get('/get_ac'              , [Municipalities::class, 'auco'])  ->name('municipalities.auco'    );
Route::middleware(['auth:sanctum', 'verified'])->get('/get_city/{from}'     , [Municipalities::class, 'city'])  ->name('municipalities.city'    );
Route::middleware(['auth:sanctum', 'verified'])->get('/get_muni/{from}'     , [Municipalities::class, 'muni'])  ->name('municipalities.muni'    );
Route::middleware(['auth:sanctum', 'is_admin'])->post('/login_locs'         , [Geolocations::class, 'index'])   ->name('geolocations.all'       );


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