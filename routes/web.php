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
        Route::get('supplier/index', 'SupplierController@index')->name(
            'supplier.index'
        );
        Route::get('supplier/create', 'SupplierController@create')->name(
            'supplier.create'
        );
        Route::post('supplier/store', 'SupplierController@store')->name(
            'suppliers.store'
        );
        Route::get('supplier/edit/{id}', 'SupplierController@edit')->name(
            'supplier.edit'
        );
        Route::post('supplier/update/{id}', 'SupplierController@update')->name(
            'supplier.update'
        );
        Route::get('supplier/delete/{id}', 'SupplierController@destroy')->name(
            'supplier.dalete'
        );
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
        Route::get('brand/index', 'BrandController@index')->name('brand.index');
        Route::get('brand/create', 'BrandController@create')->name(
            'brand.create'
        );
        Route::post('brand/store', 'BrandController@store')->name(
            'brand.store'
        );
        Route::get('brand/edit/{id}', 'BrandController@edit')->name(
            'brand.edit'
        );
        Route::post('brand/update/{id}', 'BrandController@update')->name(
            'brand.update'
        );
        Route::get('brand/delete/{id}', 'BrandController@destroy')->name(
            'brand.delete'
        );
        //branch route
        Route::get('branch/index', 'BranchController@index')->name(
            'branch.index'
        );
        Route::get('branch/create', 'BranchController@create')->name(
            'branch.create'
        );
        Route::post('branch/store', 'BranchController@store')->name(
            'branch.store'
        );
        Route::get('branch/edit/{id}', 'BranchController@edit')->name(
            'branch.edit'
        );
        Route::post('branch/update/{id}', 'BranchController@update')->name(
            'branch.update'
        );
        Route::get('branch/delete/{id}', 'BranchController@destroy')->name(
            'branch.delete'
        );
        //product route
        Route::get('product/index', 'ProductController@index');
        Route::post('product/store', 'ProductController@store');
        Route::get('product/edit/{id}', 'ProductController@edit');
        Route::post('product/update/{id}', 'ProductController@update');
        Route::get('product/delete/{id}', 'ProductController@destroy');
        //purchage route
        Route::get('purchage/index', 'PurchageController@index')->name('purchage.index');
        Route::get('purchage/create', 'PurchageController@create')->name('purchage.create');
        Route::post('purchage/store', 'PurchageController@store')->name('purchage.store');
        Route::get('purchage/edit/{id}', 'PurchageController@edit')->name('purchage.edit');
        Route::post('purchage/update/{id}', 'PurchageController@update')->name('purchage.update');
        Route::get('purchage/delete/{id}', 'PurchageController@destroy')->name('purchage.delete');
        Route::get('purchage/pending', 'PurchageController@getPending')->name('purchage.pending');
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
        Route::get('expense/index', 'ExpenseController@index')->name('expense.index');
        Route::get('expense/create', 'ExpenseController@create')->name('expense.create');
        Route::post('expense/store', 'ExpenseController@store')->name('expense.store');
        Route::get('expense/edit/{id}', 'ExpenseController@edit')->name('expense.edit');
        Route::post('expense/update/{id}', 'ExpenseController@update')->name('expense.edit');
        Route::get('expense/delete/{id}', 'ExpenseController@destroy')->name('expense.delete');

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
