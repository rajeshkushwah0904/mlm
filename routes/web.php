<?php

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



Auth::routes();
Route::get('/', 'HomeController@home')->name('home');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/founder_message', 'HomeController@founder_message')->name('founder_message');
Route::get('/package', 'HomeController@package')->name('package');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/terms_and_condition', 'HomeController@terms_and_condition')->name('terms_and_condition');
Route::get('/gallery', 'HomeController@gallery')->name('gallery');
Route::get('/banking', 'HomeController@banking')->name('banking');
Route::get('/product', 'HomeController@product')->name('product');
Route::get('/product_details', 'HomeController@product_details')->name('product_details');

Route::get('/loginpage', 'HomeController@loginpage')->name('loginpage');
Route::get('/registerpage', 'HomeController@registerpage')->name('registerpage');
Route::get('/dashboard', 'HomeController@dashboard')->name('backend.dashboard');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('auth.logout');
Route::get('/distributors/register', ['as' => 'distributors.register', 'uses' => 'DistributorController@register']);
Route::post('/distributors/register', ['as' => 'distributors.register', 'uses' => 'DistributorController@register_store']);
Route::get('/distributors/login', ['as' => 'distributors.login', 'uses' => 'DistributorController@login']);
Route::post('/distributors/login', ['as' => 'distributors.login', 'uses' => 'DistributorController@login_store']);


Route::group(['prefix' => 'packages'], function() {    
    Route::get('/packages/add_product', ['as' => 'backend.packages.add_product', 'uses' => 'PackageController@add_product']);
    Route::get('/', ['as' => 'backend.packages.index', 'uses' => 'PackageController@index']);
    Route::get('/create', ['as' => 'backend.packages.create', 'uses' => 'PackageController@create']);
    Route::post('/create', ['as' => 'backend.packages.create', 'uses' => 'PackageController@store']);
    Route::get('/{id}/edit', ['as' => 'backend.packages.edit', 'uses' => 'PackageController@edit']);
    Route::post('/{id}/edit', ['as' => 'backend.packages.edit', 'uses' => 'PackageController@update']);
    Route::get('/{id}/approve', ['as' => 'backend.packages.approve', 'uses' => 'PackageController@approve']);
    Route::get('/{id}/delete', ['as' => 'backend.packages.delete', 'uses' => 'PackageController@destroy']);
});


Route::group(['prefix' => 'distributors'], function() {    
    Route::get('/list/{id}', ['as' => 'backend.distributors.list', 'uses' => 'DistributorController@list']);
    Route::get('/{id}/approve', ['as' => 'backend.distributors.approve', 'uses' => 'DistributorController@approve']);
    Route::get('/{id}/delete', ['as' => 'backend.distributors.delete', 'uses' => 'DistributorController@destroy']);
});

Route::group(['prefix' => 'kycs'], function() {    
    Route::get('/', ['as' => 'backend.kycs.index', 'uses' => 'KycController@index']);
    Route::get('/create', ['as' => 'backend.kycs.create', 'uses' => 'KycController@create']);
    Route::post('/create', ['as' => 'backend.kycs.create', 'uses' => 'KycController@store']);
    Route::get('/{id}/edit', ['as' => 'backend.kycs.edit', 'uses' => 'KycController@edit']);
    Route::post('/{id}/edit', ['as' => 'backend.kycs.edit', 'uses' => 'KycController@update']);
    Route::get('/{id}/approve', ['as' => 'backend.kycs.approve', 'uses' => 'KycController@approve']);
    Route::get('/{id}/delete', ['as' => 'backend.kycs.delete', 'uses' => 'KycController@destroy']);
});

Route::group(['prefix' => 'categories'], function() {    
    Route::get('/', ['as' => 'backend.categories.index', 'uses' => 'CategoryController@index']);
    Route::get('/create', ['as' => 'backend.categories.create', 'uses' => 'CategoryController@create']);
    Route::post('/create', ['as' => 'backend.categories.create', 'uses' => 'CategoryController@store']);
    Route::get('/{id}/edit', ['as' => 'backend.categories.edit', 'uses' => 'CategoryController@edit']);
    Route::post('/{id}/edit', ['as' => 'backend.categories.edit', 'uses' => 'CategoryController@update']);
    Route::get('/{id}/approve', ['as' => 'backend.categories.approve', 'uses' => 'CategoryController@approve']);
    Route::get('/{id}/delete', ['as' => 'backend.categories.delete', 'uses' => 'CategoryController@destroy']);
        Route::get('/{id}/product_list', ['as' => 'backend.categories.product_list', 'uses' => 'CategoryController@product_list']);
});

Route::group(['prefix' => 'subcategories'], function() {    
    Route::get('/', ['as' => 'backend.subcategories.index', 'uses' => 'SubcategoryController@index']);
    Route::get('/create', ['as' => 'backend.subcategories.create', 'uses' => 'SubcategoryController@create']);
    Route::post('/create', ['as' => 'backend.subcategories.create', 'uses' => 'SubcategoryController@store']);
    Route::get('/{id}/edit', ['as' => 'backend.subcategories.edit', 'uses' => 'SubcategoryController@edit']);
    Route::post('/{id}/edit', ['as' => 'backend.subcategories.edit', 'uses' => 'SubcategoryController@update']);
    Route::get('/{id}/approve', ['as' => 'backend.subcategories.approve', 'uses' => 'SubcategoryController@approve']);
    Route::get('/{id}/delete', ['as' => 'backend.subcategories.delete', 'uses' => 'SubcategoryController@destroy']);
    Route::get('/{id}/product_list', ['as' => 'backend.subcategories.product_list', 'uses' => 'SubcategoryController@product_list']);
});

Route::group(['prefix' => 'products'], function() {    
    Route::get('/', ['as' => 'backend.products.index', 'uses' => 'ProductController@index']);
    Route::get('/create', ['as' => 'backend.products.create', 'uses' => 'ProductController@create']);
    Route::post('/create', ['as' => 'backend.products.create', 'uses' => 'ProductController@store']);
    Route::get('/{id}/edit', ['as' => 'backend.products.edit', 'uses' => 'ProductController@edit']);
    Route::post('/{id}/edit', ['as' => 'backend.products.edit', 'uses' => 'ProductController@update']);
    Route::get('/{id}/approve', ['as' => 'backend.products.approve', 'uses' => 'ProductController@approve']);
    Route::get('/{id}/delete', ['as' => 'backend.products.delete', 'uses' => 'ProductController@destroy']);
        Route::get('/{id}/single_view', ['as' => 'backend.products.single_view', 'uses' => 'ProductController@single_view']);
});


Route::group(['prefix' => 'pins'], function() {    
    Route::get('/', ['as' => 'backend.pins.index', 'uses' => 'PinController@index']);
    Route::get('/create', ['as' => 'backend.pins.create', 'uses' => 'PinController@create']);
    Route::post('/create', ['as' => 'backend.pins.create', 'uses' => 'PinController@store']);
    Route::get('/{id}/edit', ['as' => 'backend.pins.edit', 'uses' => 'PinController@edit']);
    Route::post('/{id}/edit', ['as' => 'backend.pins.edit', 'uses' => 'PinController@update']);
    Route::get('/{id}/approve', ['as' => 'backend.pins.approve', 'uses' => 'PinController@approve']);
    Route::get('/{id}/delete', ['as' => 'backend.pins.delete', 'uses' => 'PinController@destroy']);
});