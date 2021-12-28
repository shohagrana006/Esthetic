<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(
    [
        'middleware' => 'auth',
        'namespace' => 'App\Http\Controllers\Admin',
    ],
    function () {
        Route::get('/', 'DashboardController@index');
        Route::get('logout', 'AuthController@logout');
        //customer route
        Route::get('customer/index', 'CustomerController@index');
        Route::post('customer/store', 'CustomerController@store');
        Route::get('customer/edit/{id}', 'CustomerController@edit');
        Route::post('customer/update/{id}', 'CustomerController@update');
        Route::get('customer/delete/{id}', 'CustomerController@destroy');
        //suppliers route
        Route::get('supplier/index', 'SupplierController@index')->name('supplier.index');
        Route::get('supplier/create', 'SupplierController@create')->name('supplier.create');
        Route::post('supplier/store', 'SupplierController@store')->name('suppliers.store');
        Route::get('supplier/edit/{id}', 'SupplierController@edit');
        Route::post('supplier/update/{id}', 'SupplierController@update');
        Route::get('supplier/delete/{id}', 'SupplierController@destroy');
        //unit route
        Route::get('unit/index', 'UnitController@index');
        Route::post('unit/store', 'UnitController@store');
        Route::get('unit/edit/{id}', 'UnitController@edit');
        Route::post('unit/update/{id}', 'UnitController@update');
        Route::get('unit/delete/{id}', 'UnitController@destroy');
        //warehouse route
        Route::get('warehouse/index', 'WarehouseController@index');
        Route::post('warehouse/store', 'WarehouseController@store');
        Route::get('warehouse/edit/{id}', 'WarehouseController@edit');
        Route::post('warehouse/update/{id}', 'WarehouseController@update');
        Route::get('warehouse/delete/{id}', 'WarehouseController@destroy');
        //category route
        Route::get('category/index', 'CategoryController@index');
        Route::post('category/store', 'CategoryController@store');
        Route::get('category/edit/{id}', 'CategoryController@edit');
        Route::post('category/update/{id}', 'CategoryController@update');
        Route::get('category/delete/{id}', 'CategoryController@destroy');
        //subcategory route
        Route::get('subcategory/index', 'SubCategoryController@index');
        Route::post('subcategory/store', 'SubCategoryController@store');
        Route::get(
            'subcategory/edit/{sub_category_slug}',
            'SubCategoryController@edit'
        );
        Route::post(
            'subcategory/update/{sub_category_slug}',
            'SubCategoryController@update'
        );
        Route::get(
            'subcategory/delete/{sub_category_slug}',
            'SubCategoryController@destroy'
        );
        //brand route
        Route::get('brand/index', 'BrandController@index');
        Route::post('brand/store', 'BrandController@store');
        Route::get('brand/edit/{brand_slug}', 'BrandController@edit');
        Route::post('brand/update/{brand_slug}', 'BrandController@update');
        Route::get('brand/delete/{id}', 'BrandController@destroy');
        //branch route
        Route::get('branch/index', 'BranchController@index');
        Route::post('branch/store', 'BranchController@store');
        Route::get('branch/edit/{branch_slug}', 'BranchController@edit');
        Route::post('branch/update/{branch_slug}', 'BranchController@update');
        Route::get('branch/delete/{id}', 'BranchController@destroy');
        //product route
        Route::get('product/index', 'ProductController@index');
        Route::post('product/store', 'ProductController@store');
        Route::get('product/edit/{id}', 'ProductController@edit');
        Route::post('product/update/{id}', 'ProductController@update');
        Route::get('product/delete/{id}', 'ProductController@destroy');
        //purchage route
        Route::get('purchage/index', 'PurchageController@index');
        Route::post('purchage/store', 'PurchageController@store');
        Route::get('purchage/edit/{id}', 'PurchageController@edit');
        Route::post('purchage/update/{id}', 'PurchageController@update');
        Route::get('purchage/delete/{id}', 'PurchageController@destroy');
        Route::get('purchage/pending', 'PurchageController@getPending');
        Route::post(
            'purchage/updatepending/{id}',
            'PurchageController@updatePurchaseStatus'
        );
        //damage route
        Route::get('damage/index', 'DamageController@index');
        Route::post('damage/store', 'DamageController@store');
        Route::get('damage/edit/{id}', 'DamageController@edit');
        Route::post('damage/update/{id}', 'DamageController@update');
        Route::get('damage/delete/{id}', 'DamageController@destroy');
        //expense route
        Route::get('expense/index', 'ExpenseController@index');
        Route::post('expense/store', 'ExpenseController@store');
        Route::get('expense/edit/{id}', 'ExpenseController@edit');
        Route::post('expense/update/{id}', 'ExpenseController@update');
        Route::get('expense/delete/{id}', 'ExpenseController@destroy');

        Route::get('expense/today', 'ExpenseController@today_expence');
        Route::get(
            'expense/month/{month?}',
            'ExpenseController@monthly_expense'
        );
        Route::get(
            'expense/yearly/{year?}',
            'ExpenseController@yearly_expense'
        );

        //invoice route
        Route::get('invoice/index', 'InvoiceController@index');
        Route::get('product/search/{sku}', 'InvoiceController@productSearch');
        Route::post('invoice/store', 'InvoiceController@store');
        Route::get('invoice/delete/{id}', 'InvoiceController@destroy');
        Route::get('invoice/pending', 'InvoiceController@getPending');
    }
);

Auth::routes();

Route::get('/home', [
    App\Http\Controllers\Admin\DashboardController::class,
    'index',
])->name('home');
