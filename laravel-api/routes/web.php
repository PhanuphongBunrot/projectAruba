<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\TestapiController;
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


Route::get('/',[CurlController::class,'api']);
Route::get('/clients',[ClientsController::class,'clients']);
Route::get('/home', [TestapiController::class,'index']);
Route::get('/login', function () {
    return view('login');
});

