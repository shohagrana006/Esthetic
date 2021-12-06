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
        Route::get('unit/index','UnitController@index');
    });


});
//Route::post('register',[App\Http\Controllers\Admin\AuthController::class ,'register']);
////Route::post('/login',[AuthController::class,'login']);
