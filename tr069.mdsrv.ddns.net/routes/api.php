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

Route::group([
    'middleware' => 'ap_buzz',
    'prefix' => 'ap_buzz'

], function ($router) {
    
Route::post('/get_aps', [App\Http\Controllers\ApsController::class, 'get_aps']);  
Route::post('/get_meraki_aps', [App\Http\Controllers\ApsController::class, 'get_meraki_aps']);


});






Route::get('/login', function() {
    return 'not auth';
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');
    Route::post('/logout', 'AuthController@logout');
   // Route::get('/refresh', 'AuthController@refresh');
    Route::post('/checkToken', 'AuthController@checkToken');
    Route::get('/user-profile', 'AuthController@userProfile');   
    
    Route::apiResource('devices', API\DeviceController::class);
    Route::apiResource('tasks', API\TasksController::class);
    Route::apiResource('models', API\ModelController::class);
    Route::apiResource('paramiter', API\ParamiterController::class);
    Route::apiResource('users', API\UsersControllre::class);

    Route::apiResource('dashboard','API\DashboardController');

    
    
    
    
Route::get('gettotal/{id}', 'API\DashboardController@gettotal');
Route::get('getproductclass/{id}', 'API\DashboardController@ProductClass');


Route::post('setParameterValues', 'API\DeviceController@setParameterValues');
Route::post('refresh_all', 'API\DeviceController@refresh_all');
Route::post('reboot', 'API\DeviceController@reboot');
Route::post('reset', 'API\DeviceController@reset');
Route::post('deletecpe', 'API\DeviceController@deletecpe');

Route::post('adddevice', 'API\DeviceController@adddevice');


});


