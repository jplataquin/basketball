<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();




Route::middleware([
    'auth',
    \App\Http\Middleware\ClubOwner::class
])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/league/create', [App\Http\Controllers\LeagueController::class, 'create']);
    Route::get('/league/list', [App\Http\Controllers\LeagueController::class, 'list']);
    Route::get('/league/{id}', [App\Http\Controllers\LeagueController::class, 'index']);
    Route::get('/league/{league_id}/team/list', [App\Http\Controllers\TeamController::class, 'list']);
    Route::get('/league/team/display/{id}', [App\Http\Controllers\TeamController::class, 'display']);
    Route::get('/league/team/create/{id}', [App\Http\Controllers\TeamController::class, 'create']);
});


Route::middleware([
    'auth',
    \App\Http\Middleware\Player::class
])->group(function(){
    Route::get('/player_dashboard', [App\Http\Controllers\PlayerController::class, 'index'])->name('player_dashboard');
});

Route::get('adarna.js', function(){

    $response = Response::make(File::get(base_path('node_modules/adarna/dist/adarna.js')), 200);
    $response->header("Content-Type", 'text/javascript');

    return $response;
});