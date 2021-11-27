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
$user_login = ((int) request()->segment(2) > 0 ? 'u/' . request()->segment(2) : '');

Auth::routes();
Route::get('/', 'HomeController@home')->name('home');
Route::get('/qr_code', 'HomeController@qr_code')->name('qr_code');

Route::get('/home', 'HomeController@home')->name('home');
Route::get('category/{id}', 'HomeController@category')->name('layout.category');
Route::get('/subcategory/{id}', 'HomeController@category')->name('layout.subcategory');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/founder_message', 'HomeController@founder_message')->name('founder_message');
Route::get('/package', 'HomeController@package')->name('package');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/terms_and_condition', 'HomeController@terms_and_condition')->name('terms_and_condition');
Route::get('/gallery', 'HomeController@gallery')->name('gallery');
Route::get('/banking', 'HomeController@banking')->name('banking');
Route::get('/allproducts', 'HomeController@allproducts')->name('allproducts');
Route::get('/product_detail/{id}', 'HomeController@product_detail')->name('product_detail');
Route::get('/cart', 'HomeController@cart')->name('cart')->middleware('auth');
Route::get('/checkout', 'HomeController@checkout')->name('checkout')->middleware('auth');
Route::post('/checkout_wallet', 'HomeController@checkout_wallet')->name('checkout_wallet')->middleware('auth');
Route::post('/checkout', 'HomeController@checkout_store')->name('checkout')->middleware('auth');
Route::get('/invoice/{id}', 'HomeController@invoice')->name('layouts.invoice')->middleware('auth');
Route::get('/privacy_policy', 'HomeController@privacy_policy')->name('privacy_policy');
Route::get('/refund_policy', 'HomeController@refund_policy')->name('refund_policy');

Route::get('/send_otp', 'UserController@send_otp')->name('send_otp');
Route::get('/loginpage', 'HomeController@loginpage')->name('loginpage');
Route::get('/registerpage', 'HomeController@registerpage')->name('registerpage');
Route::get('/dashboard', 'BackendController@dashboard')->name('backend.dashboard')->middleware('auth');
Route::get('distributor/dashboard', 'BackendController@distributor_dashboard')->name('backend.distributor.dashboard')->middleware('auth');
Route::get('/dashboard/genealogy_tree', 'BackendController@genealogy_tree')->name('backend.genealogy_tree')->middleware('auth');

Route::get('/profile', 'BackendController@profile')->name('backend.profile')->middleware('auth');
Route::post('/profile', 'BackendController@profile_update')->name('backend.profile')->middleware('auth');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('auth.logout')->middleware('auth');
Route::get('/distributors/register', ['as' => 'distributors.register', 'uses' => 'DistributorController@register']);
Route::post('/distributors/register', ['as' => 'distributors.register', 'uses' => 'DistributorController@register_store']);
Route::get('/distributors/login', ['as' => 'distributors.login', 'uses' => 'DistributorController@login']);
Route::get('/distributors/as_login', ['as' => 'distributors.as_login', 'uses' => 'DistributorController@as_login']);

Route::post('/distributors/login', ['as' => 'distributors.login', 'uses' => 'DistributorController@login_store']);
Route::post('/distributors/register_send_otp', ['as' => 'distributors.register_send_otp', 'uses' => 'DistributorController@register_send_otp']);

Route::group(['prefix' => 'packages', 'middleware' => ['auth']], function () {
    Route::get('/packages/add_product', ['as' => 'backend.packages.add_product', 'uses' => 'PackageController@add_product']);
    Route::get('/', ['as' => 'backend.packages.index', 'uses' => 'PackageController@index']);
    Route::get('/create', ['as' => 'backend.packages.create', 'uses' => 'PackageController@create']);
    Route::post('/create', ['as' => 'backend.packages.create', 'uses' => 'PackageController@store']);
    Route::get('/{id}/edit', ['as' => 'backend.packages.edit', 'uses' => 'PackageController@edit']);
    Route::post('/{id}/edit', ['as' => 'backend.packages.edit', 'uses' => 'PackageController@update']);
    Route::get('/{id}/approve', ['as' => 'backend.packages.approve', 'uses' => 'PackageController@approve']);
    Route::get('/{id}/delete', ['as' => 'backend.packages.delete', 'uses' => 'PackageController@destroy']);
    Route::get('/purchase_package', ['as' => 'backend.packages.purchase_package', 'uses' => 'PackageController@purchase_package']);
    Route::post('/purchase_package', ['as' => 'backend.packages.purchase_package', 'uses' => 'PackageController@purchase_package_store']);
    Route::get('/purchase_for_other', ['as' => 'backend.packages.purchase_for_other', 'uses' => 'PackageController@purchase_for_other']);
    Route::post('/purchase_for_other', ['as' => 'backend.packages.purchase_for_other', 'uses' => 'PackageController@purchase_for_other_store']);
});

Route::group(['prefix' => 'distributors', 'middleware' => ['auth']], function () {
    
    Route::get('/list', ['as' => 'backend.distributors.list', 'uses' => 'DistributorController@list']);
    Route::get('/downline_list', ['as' => 'backend.distributors.downline_list', 'uses' => 'DistributorController@downline_list']);
    Route::post('/distributor_filter_data', ['as' => 'backend.distributors.distributor_filter_data', 'uses' => 'DistributorController@distributor_filter_data']);
    Route::post('/distributor_downline_filter_data', ['as' => 'backend.distributors.distributor_downline_filter_data', 'uses' => 'DistributorController@distributor_downline_filter_data']);
    Route::get('/{id}/block', ['as' => 'backend.distributors.block', 'uses' => 'DistributorController@block']);
    Route::get('/{id}/activate', ['as' => 'backend.distributors.activate', 'uses' => 'DistributorController@activate']);
    Route::get('/{id}/delete', ['as' => 'backend.distributors.delete', 'uses' => 'DistributorController@destroy']);
    
});

Route::group(['prefix' => 'distributors'], function () {
    Route::get('/add_to_cart/{id}', ['as' => 'addtocarts.add_to_cart', 'uses' => 'AddtocartController@add_to_cart'])->middleware('auth');
    Route::get('/remove_from_cart/{id}', ['as' => 'addtocarts.remove_from_cart', 'uses' => 'AddtocartController@remove_from_cart'])->middleware('auth');
});

Route::group(['prefix' => 'kycs', 'middleware' => ['auth']], function () {
    Route::get('/', ['as' => 'backend.kycs.index', 'uses' => 'KycController@index']);
    Route::get('/{id}/approved', ['as' => 'backend.kycs.approved', 'uses' => 'KycController@approved']);
    Route::get('/{id}/rejected', ['as' => 'backend.kycs.rejected', 'uses' => 'KycController@rejected']);

    Route::get('/update', ['as' => 'backend.kycs.update', 'uses' => 'KycController@update']);
    Route::post('/update', ['as' => 'backend.kycs.update', 'uses' => 'KycController@update_store']);

    Route::get('/create', ['as' => 'backend.kycs.create', 'uses' => 'KycController@create']);
    Route::post('/create', ['as' => 'backend.kycs.create', 'uses' => 'KycController@store']);
    Route::get('/{id}/edit', ['as' => 'backend.kycs.edit', 'uses' => 'KycController@edit']);
    Route::post('/{id}/edit', ['as' => 'backend.kycs.edit', 'uses' => 'KycController@edit_store']);
    Route::get('/{id}/approve', ['as' => 'backend.kycs.approve', 'uses' => 'KycController@approve']);
    Route::get('/{id}/delete', ['as' => 'backend.kycs.delete', 'uses' => 'KycController@destroy']);

});

Route::group(['prefix' => 'categories', 'middleware' => ['auth']], function () {
    Route::get('/', ['as' => 'backend.categories.index', 'uses' => 'CategoryController@index']);
    Route::get('/create', ['as' => 'backend.categories.create', 'uses' => 'CategoryController@create']);
    Route::post('/create', ['as' => 'backend.categories.create', 'uses' => 'CategoryController@store']);
    Route::get('/{id}/edit', ['as' => 'backend.categories.edit', 'uses' => 'CategoryController@edit']);
    Route::post('/{id}/edit', ['as' => 'backend.categories.edit', 'uses' => 'CategoryController@update']);
    Route::get('/{id}/approve', ['as' => 'backend.categories.approve', 'uses' => 'CategoryController@approve']);
    Route::get('/{id}/delete', ['as' => 'backend.categories.delete', 'uses' => 'CategoryController@destroy']);
    Route::get('/{id}/product_list', ['as' => 'backend.categories.product_list', 'uses' => 'CategoryController@product_list']);
});

Route::group(['prefix' => 'subcategories', 'middleware' => ['auth']], function () {
    Route::get('/', ['as' => 'backend.subcategories.index', 'uses' => 'SubcategoryController@index']);
    Route::get('/create', ['as' => 'backend.subcategories.create', 'uses' => 'SubcategoryController@create']);
    Route::post('/create', ['as' => 'backend.subcategories.create', 'uses' => 'SubcategoryController@store']);
    Route::get('/{id}/edit', ['as' => 'backend.subcategories.edit', 'uses' => 'SubcategoryController@edit']);
    Route::post('/{id}/edit', ['as' => 'backend.subcategories.edit', 'uses' => 'SubcategoryController@update']);
    Route::get('/{id}/approve', ['as' => 'backend.subcategories.approve', 'uses' => 'SubcategoryController@approve']);
    Route::get('/{id}/delete', ['as' => 'backend.subcategories.delete', 'uses' => 'SubcategoryController@destroy']);
    Route::get('/{id}/product_list', ['as' => 'backend.subcategories.product_list', 'uses' => 'SubcategoryController@product_list']);
});

Route::group(['prefix' => 'products', 'middleware' => ['auth']], function () {
    Route::get('/', ['as' => 'backend.products.index', 'uses' => 'ProductController@index']);
    Route::get('/create', ['as' => 'backend.products.create', 'uses' => 'ProductController@create']);
    Route::post('/create', ['as' => 'backend.products.create', 'uses' => 'ProductController@store']);
    Route::get('/{id}/edit', ['as' => 'backend.products.edit', 'uses' => 'ProductController@edit']);
    Route::post('/{id}/edit', ['as' => 'backend.products.edit', 'uses' => 'ProductController@update']);
    Route::get('/{id}/active', ['as' => 'backend.products.active', 'uses' => 'ProductController@active']);
    Route::get('/{id}/deactive', ['as' => 'backend.products.deactive', 'uses' => 'ProductController@deactive']);
    Route::get('/{id}/delete', ['as' => 'backend.products.delete', 'uses' => 'ProductController@destroy']);
    Route::get('/{id}/single_view', ['as' => 'backend.products.single_view', 'uses' => 'ProductController@single_view']);
});

Route::group(['prefix' => 'rewards', 'middleware' => ['auth']], function () {
    Route::get('/', ['as' => 'backend.rewards.index', 'uses' => 'RewardController@index']);
    Route::get('/create', ['as' => 'backend.rewards.create', 'uses' => 'RewardController@create']);
    Route::post('/create', ['as' => 'backend.rewards.create', 'uses' => 'RewardController@store']);
    Route::get('/{id}/edit', ['as' => 'backend.rewards.edit', 'uses' => 'RewardController@edit']);
    Route::post('/{id}/edit', ['as' => 'backend.rewards.edit', 'uses' => 'RewardController@update']);
    Route::get('/{id}/active', ['as' => 'backend.rewards.active', 'uses' => 'RewardController@active']);
    Route::get('/{id}/deactive', ['as' => 'backend.rewards.deactive', 'uses' => 'RewardController@deactive']);
    Route::get('/{id}/delete', ['as' => 'backend.rewards.delete', 'uses' => 'RewardController@destroy']);
    Route::get('/{id}/single_view', ['as' => 'backend.rewards.single_view', 'uses' => 'RewardController@single_view']);
});

Route::group(['prefix' => 'webcontents', 'middleware' => ['auth']], function () {
    Route::get('/', ['as' => 'backend.webcontents.index', 'uses' => 'WebcontentController@index']);
    Route::get('/add_logo', ['as' => 'backend.webcontents.add_logo', 'uses' => 'WebcontentController@add_logo']);
    Route::post('/create', ['as' => 'backend.webcontents.create', 'uses' => 'WebcontentController@store']);
    Route::get('/{id}/edit', ['as' => 'backend.webcontents.edit', 'uses' => 'WebcontentController@edit']);
    Route::post('/{id}/edit', ['as' => 'backend.webcontents.edit', 'uses' => 'WebcontentController@update']);
    Route::get('/{id}/active', ['as' => 'backend.webcontents.active', 'uses' => 'WebcontentController@active']);
    Route::get('/{id}/deactive', ['as' => 'backend.webcontents.deactive', 'uses' => 'WebcontentController@deactive']);
    Route::get('/{id}/delete', ['as' => 'backend.webcontents.delete', 'uses' => 'WebcontentController@destroy']);
    Route::get('/{id}/single_view', ['as' => 'backend.webcontents.single_view', 'uses' => 'WebcontentController@single_view']);
});

Route::group(['prefix' => 'banks', 'middleware' => ['auth']], function () {
    Route::get('/', ['as' => 'backend.banks.index', 'uses' => 'BankController@index']);
    Route::get('/create', ['as' => 'backend.banks.create', 'uses' => 'BankController@create']);
    Route::post('/create', ['as' => 'backend.banks.create', 'uses' => 'BankController@store']);
    Route::get('/{id}/edit', ['as' => 'backend.banks.edit', 'uses' => 'BankController@edit']);
    Route::post('/{id}/edit', ['as' => 'backend.banks.edit', 'uses' => 'BankController@update']);
    Route::get('/{id}/approved', ['as' => 'backend.banks.approved', 'uses' => 'BankController@approved']);
    Route::get('/{id}/rejected', ['as' => 'backend.banks.rejected', 'uses' => 'BankController@rejected']);
    Route::get('/{id}/delete', ['as' => 'backend.banks.delete', 'uses' => 'BankController@destroy']);
});

Route::group(['prefix' => 'incomes', 'middleware' => ['auth']], function () {

    Route::get('/all_direct_income', ['as' => 'backend.incomes.all_direct_income', 'uses' => 'IncomeController@all_direct_income']);
    Route::get('/direct_income', ['as' => 'backend.incomes.direct_income', 'uses' => 'IncomeController@direct_income']);
    Route::get('/reward_income', ['as' => 'backend.incomes.reward_income', 'uses' => 'IncomeController@reward_income']);
    Route::get('/repurchase_income', ['as' => 'backend.incomes.repurchase_income', 'uses' => 'IncomeController@repurchase_income']);
    Route::get('/all_repurchase_income', ['as' => 'backend.incomes.all_repurchase_income', 'uses' => 'IncomeController@all_repurchase_income']);

    Route::get('/create', ['as' => 'backend.incomes.create', 'uses' => 'IncomeController@create']);
    Route::post('/create', ['as' => 'backend.incomes.create', 'uses' => 'IncomeController@store']);
    Route::get('/{id}/edit', ['as' => 'backend.incomes.edit', 'uses' => 'IncomeController@edit']);
    Route::post('/{id}/edit', ['as' => 'backend.incomes.edit', 'uses' => 'IncomeController@update']);
    Route::get('/{id}/approve', ['as' => 'backend.incomes.approve', 'uses' => 'IncomeController@approve']);
    Route::get('/{id}/delete', ['as' => 'backend.incomes.delete', 'uses' => 'IncomeController@destroy']);
});

Route::group(['prefix' => 'orders', 'middleware' => ['auth']], function () {
    Route::get('/', ['as' => 'backend.orders.index', 'uses' => 'OrderController@index']);
    Route::get('/view', ['as' => 'backend.orders.view', 'uses' => 'OrderController@view']);
    Route::get('/print', ['as' => 'backend.orders.print', 'uses' => 'OrderController@print']);

    Route::post('/create', ['as' => 'backend.orders.create', 'uses' => 'OrderController@store']);
    Route::get('/{id}/edit', ['as' => 'backend.orders.edit', 'uses' => 'OrderController@edit']);
    Route::post('/{id}/edit', ['as' => 'backend.orders.edit', 'uses' => 'OrderController@update']);
    Route::get('/{id}/approve', ['as' => 'backend.orders.approve', 'uses' => 'OrderController@approve']);
    Route::get('/{id}/delete', ['as' => 'backend.orders.delete', 'uses' => 'OrderController@destroy']);
    Route::get('/{id}/product_list', ['as' => 'backend.orders.product_list', 'uses' => 'OrderController@product_list']);
});

Route::group(['prefix' => 'supports', 'middleware' => ['auth']], function () {
    Route::get('/', ['as' => 'backend.supports.index', 'uses' => 'SupportController@index']);
    Route::get('/add', ['as' => 'backend.supports.add', 'uses' => 'SupportController@add']);
    Route::post('/add', ['as' => 'backend.supports.add', 'uses' => 'SupportController@add_store']);
    Route::get('/{id}/edit', ['as' => 'backend.supports.edit', 'uses' => 'SupportController@edit']);
    Route::post('/{id}/edit', ['as' => 'backend.supports.edit', 'uses' => 'SupportController@update']);
    Route::get('/{id}/open', ['as' => 'backend.supports.open', 'uses' => 'SupportController@open']);
    Route::get('/{id}/closed', ['as' => 'backend.supports.closed', 'uses' => 'SupportController@closed']);
    Route::get('/{id}/delete', ['as' => 'backend.supports.delete', 'uses' => 'SupportController@destroy']);
    Route::get('/{id}/single_view', ['as' => 'backend.supports.single_view', 'uses' => 'SupportController@single_view']);
});

Route::group(['prefix' => 'users', 'middleware' => ['auth']], function () {
    Route::get('/changepassword', ['as' => 'myaccount.changepassword', 'uses' => 'UserController@changepassword']);
    Route::post('/changepassword', ['as' => 'myaccount.changepassword', 'uses' => 'UserController@changepasswordpost']);
});