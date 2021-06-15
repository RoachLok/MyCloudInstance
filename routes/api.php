<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLogs;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('token_auth') ->post('/login_logs/{test}' , [UserLogs::class, 'index'])       ->name('userlogs.token.all'           );
Route::middleware('token_auth') ->post('/list_users'        , [UserLogs::class, 'list_users'])  ->name('userlogs.token.userList'      );
Route::middleware('token_auth') ->post('/login_logs'        , [UserLogs::class, 'user_logs'])   ->name('userlogs.token.user'          );


// Municipalities data queries.
Route::middleware('token_auth')->post('/despo_muni'         , [Municipalities::class, 'despo']) ->name('municipalities.token.despo'  );
Route::middleware('token_auth')->post('/municipalities'     , [Municipalities::class, 'index']) ->name('municipalities.token.all'    );
Route::middleware('token_auth')->post('/get_ac'             , [Municipalities::class, 'auco'])  ->name('municipalities.token.auco'   );
Route::middleware('token_auth')->post('/get_city/{from}'    , [Municipalities::class, 'city'])  ->name('municipalities.token.city'   );
Route::middleware('token_auth')->post('/get_muni/{from}'    , [Municipalities::class, 'muni'])  ->name('municipalities.token.muni'   );

/*Route::middleware('auth:sanctum')->get('/signin', function Request $request) {
    $token = $request->session()->token();

    $token = csrf_token();

    return 
}*/