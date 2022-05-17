<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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
})->name('Home');
// การสร้างเส้นทางให้กับเว็ป
Route::get('/about',[AboutController::class,'index'] )->name('about');  //การเรียกใช้งานในเว็ป ใช้ตัว controller
Route::get('/admin',[AdminController::class,'index'])->middleware('check');
Route::get('/user/vip',[UserController::class,'index'])->name('user');//การตั้งชื่อให้กับ url 