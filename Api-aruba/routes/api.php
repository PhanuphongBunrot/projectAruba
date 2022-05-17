<?php

use App\Http\Controllers\ApiapsController;
use App\Http\Controllers\ApiStatusController;
use App\Http\Controllers\ApsController;
use App\Http\Controllers\clientsController;
use App\Http\Controllers\InfoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('getaps',[ApsController::class,'aps']);
Route ::get('toaps',[ApiapsController::class,'apiaps']);
Route::get('clients',[clientsController::class,'clients']);
Route::get('master',[ApiStatusController::class,'apimaster']);
Route::get('info',[InfoController::class,'info']);