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
        Route::get('unit/index', 'UnitController@index')->name('unit.index');
        Route::get('unit/create', 'UnitController@create')->name('unit.create');
        Route::post('unit/store', 'UnitController@store')->name('unit.store');
        Route::get('unit/edit/{id}', 'UnitController@edit')->name('unit.edit');
        Route::post('unit/update/{id}', 'UnitController@update')->name('unit.update');
        Route::get('unit/delete/{id}', 'UnitController@destroy')->name('unit.delete');
        //warehouse route
        Route::get('warehouse/index', 'WarehouseController@index')->name('warehouse.index');
        Route::get('warehouse/create', 'WarehouseController@create')->name('warehouse.create');
        Route::post('warehouse/store', 'WarehouseController@store')->name('warehouse.store');
        Route::get('warehouse/edit/{id}', 'WarehouseController@edit')->name('warehouse.edit');
        Route::post('warehouse/update/{id}', 'WarehouseController@update')->name('warehouse.update');
        Route::get('warehouse/delete/{id}', 'WarehouseController@destroy')->name('warehouse.delete');
        //category route
        Route::get('category/index', 'CategoryController@index')->name('category.index');
        Route::get('category/create', 'CategoryController@create')->name('category.create');
        Route::post('category/store', 'CategoryController@store')->name('category.store');
        Route::get('category/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::post('category/update/{id}', 'CategoryController@update')->name('category.update');
        Route::get('category/delete/{id}', 'CategoryController@destroy')->name('category.delete');
        //subcategory route
        Route::get('subcategory/index', 'SubCategoryController@index')->name('subcategory.index');
        Route::get('subcategory/create', 'SubCategoryController@create')->name('subcategory.create');
        Route::post('subcategory/store', 'SubCategoryController@store')->name('subcategory.store');
        Route::get('subcategory/edit/{id}','SubCategoryController@edit')->name('subcategory.edit');
        Route::post('subcategory/update/{id}','SubCategoryController@update')->name('subcategory.update');
        Route::get('subcategory/delete/{sub_category_slug}','SubCategoryController@destroy')->name('subcategory.delete');
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
        Route::get('product/index', 'ProductController@index')->name('product.index');
        Route::get('product/create', 'ProductController@create')->name('product.create');
        Route::post('product/store', 'ProductController@store')->name('product.store');
        Route::get('product/edit/{id}', 'ProductController@edit')->name('product.edit');
        Route::post('product/update/{id}', 'ProductController@update')->name('product.update');
        Route::get('product/delete/{id}', 'ProductController@destroy')->name('product.delete');
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
