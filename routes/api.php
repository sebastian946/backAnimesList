<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\calculateController;
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

Route::get('/average/{score}/{count}',[calculateController::class,'calculate']);
Route::get('/getScore/{nameAnime}',[calculateController::class,'getAnimeScore']);
Route::get('/evaluateScore/{nameAnime}',[calculateController::class,'evaluateScore']);
