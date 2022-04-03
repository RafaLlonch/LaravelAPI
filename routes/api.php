<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\passportAuthController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\RankingController;
use App\Http\Middleware\EnsureTokenIsValid;


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

Route::post('players', [passportAuthController::class, 'createUser']);
//Crea un jugador / registrar

Route::post('login',[passportAuthController::class,'loginUser']);
//Login jugador

//add this middleware to ensure that every request is authenticated
Route::middleware('auth:api')->group(function(){   

    Route::put('players/{id}', [PlayersController::class, 'edit'])->middleware([EnsureTokenIsValid::class]);
    //Modifica el nombre de un jugador

    Route::post('players/{id}/games', [GamesController::class, 'create']);
    //Un jugador realiza una tirada

    Route::delete('players/{id}/games', [GamesController::class, 'destroy'])->middleware('admin');
    //Elimina las tiradas de un jugador

    Route::get('players', [PlayersController::class, 'index']);
    //Devuelve el listado de jugadores con el % de éxito

    Route::get('players/{id}/games', [GamesController::class, 'index']);
    //Devuelve el listado de jugadas de un jugador

    Route::get('players/ranking', [RankingController::class, 'index']);
    //Devuelve el ranking medio de todos los jugadores

    Route::get('players/ranking/loser', [RankingController::class, 'loser']);
    //Devuelve el jugador con el peor % de éxito

    Route::get('players/ranking/winner', [RankingController::class, 'winner']);
    //Devuelve el jugador con el mejor % de éxito   
});
