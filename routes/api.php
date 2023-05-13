<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware()->get('/user', function (Request $request) {
//     return $request->user();
// });


//Club owner
Route::middleware([
   'auth:sanctum',
   \App\Http\Middleware\ClubOwner::class
])->group(function () {

    Route::post('/league/create', [App\Http\Controllers\LeagueController::class, '_create']);

    Route::post('/team/create/{id}', [App\Http\Controllers\TeamController::class, '_create']);
});


//Public
Route::get('/league/list', [App\Http\Controllers\LeagueController::class, '_list']);
Route::get('/team/list/{league_id}', [App\Http\Controllers\TeamController::class, '_list']);
