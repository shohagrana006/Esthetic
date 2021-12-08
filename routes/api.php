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
        //customer route
        Route::get('customer/index','CustomerController@index');
        Route::post('customer/store','CustomerController@store');
        Route::get('customer/edit/{id}','CustomerController@edit');
        Route::post('customer/update/{id}','CustomerController@update');
        Route::get('customer/delete/{id}','CustomerController@destroy');
        //suppliers route
        Route::get('supplier/index','SupplierController@index');
        Route::post('supplier/store','SupplierController@store');
        Route::get('supplier/edit/{id}','SupplierController@edit');
        Route::post('supplier/update/{id}','SupplierController@update');
        Route::get('supplier/delete/{id}','SupplierController@destroy');
        //unit route
        Route::get('unit/index','UnitController@index');
        Route::post('unit/store','UnitController@store');
        Route::get('unit/edit/{id}','UnitController@edit');
        Route::post('unit/update/{id}','UnitController@update');
        Route::get('unit/delete/{id}','UnitController@destroy');
        //warehouse route
        Route::get('warehouse/index','WarehouseController@index');
        Route::post('warehouse/store','WarehouseController@store');
        Route::get('warehouse/edit/{id}','WarehouseController@edit');
        Route::post('warehouse/update/{id}','WarehouseController@update');
        Route::get('warehouse/delete/{id}','WarehouseController@destroy');
        //category route
        Route::get('category/index','CategoryController@index');
        Route::post('category/store','CategoryController@store');
        Route::get('category/edit/{id}','CategoryController@edit');
        Route::post('category/update/{id}','CategoryController@update');
        Route::get('category/delete/{id}','CategoryController@destroy');
        //subcategory route
        Route::get('subcategory/index','SubCategoryController@index');
        Route::post('subcategory/store','SubCategoryController@store');
        Route::get('subcategory/edit/{sub_category_slug}','SubCategoryController@edit');
        Route::post('subcategory/update/{sub_category_slug}','SubCategoryController@update');
        Route::get('subcategory/delete/{sub_category_slug}','SubCategoryController@destroy');
        //brand route
        Route::get('brand/index','BrandController@index');
        Route::post('brand/store','BrandController@store');
        Route::get('brand/edit/{brand_slug}','BrandController@edit');
        Route::post('brand/update/{brand_slug}','BrandController@update');
        Route::get('brand/delete/{id}','BrandController@destroy');
        //product route
        Route::get('product/index','ProductController@index');
        Route::post('product/store','ProductController@store');
        Route::get('product/edit/{id}','ProductController@edit');
        Route::post('product/update/{id}','ProductController@update');
        Route::get('product/delete/{id}','ProductController@destroy');

    });


});

