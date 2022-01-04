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
        Route::get('product/index', 'ProductController@index')->name('product.index');
        Route::get('product/create', 'ProductController@create')->name('product.create');
        Route::post('product/store', 'ProductController@store')->name('product.store');
        Route::get('product/edit/{id}', 'ProductController@edit')->name('product.edit');
        Route::post('product/update/{id}', 'ProductController@update')->name('product.update');
        Route::get('product/delete/{id}', 'ProductController@destroy')->name('product.delete');
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
        )->name('purchage.pending.update');
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
        Route::get('invoice/index', 'InvoiceController@index')->name('sale.index');
        Route::get('invoice/create', 'InvoiceController@create')->name('sale.create');
        Route::get('product/search/{sku}', 'InvoiceController@productSearch')->name('sale.search');
        Route::post('invoice/store', 'InvoiceController@store')->name('sale.store');
        Route::get('invoice/delete/{id}', 'InvoiceController@destroy')->name('sale.delete');
        Route::get('invoice/pending', 'InvoiceController@getPending')->name('sale.pending');

        // Bussiness
        Route::resource('bussiness', BussinessController::class);
    }
);

Auth::routes();

Route::get('/home', [
    App\Http\Controllers\Admin\DashboardController::class,
    'index',
])->name('home');
