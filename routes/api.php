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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::prefix('v1')->group(function (){
    Route::post('register',[App\Http\Controllers\Admin\AuthController::class ,'register']);
    Route::post('login',[App\Http\Controllers\Admin\AuthController::class,'login']);
    Route::group(['middleware' => 'auth:api',  'namespace' => 'App\Http\Controllers\Admin'],function (){
        Route::get('logout' ,'AuthController@logout');
        Route::get('unit/index','UnitController@index');
        Route::post('unit/store','UnitController@store');
        Route::get('unit/edit/{id}','UnitController@edit');
        Route::post('unit/update/{id}','UnitController@update');
        Route::get('unit/delete/{id}','UnitController@destroy');
        Route::get('warehouse/index','WarehouseController@index');
        Route::post('warehouse/store','WarehouseController@store');
        Route::get('warehouse/edit/{id}','WarehouseController@edit');
        Route::post('warehouse/update/{id}','WarehouseController@update');
        Route::get('warehouse/delete/{id}','WarehouseController@destroy');
        Route::get('category/index','CategoryController@index');
        Route::post('category/store','CategoryController@store');
        Route::get('category/edit/{id}','CategoryController@edit');
        Route::post('category/update/{id}','CategoryController@update');
        Route::get('category/delete/{id}','CategoryController@destroy');

    });


});

