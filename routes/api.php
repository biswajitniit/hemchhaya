<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\ApiController;

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

// Route::post('register', [UserAuthController::class, 'register']);
// Route::post('login', [UserAuthController::class, 'login']);

// Route::get('getactegories', [ApiController::class, 'get_categories'])->name('allcategories');
// Route::get('getproducts', [ApiController::class, 'get_product'])->name('getproducts');
// Route::get('getproductdetails', [ApiController::class, 'view_product_details'])->name('getproductsdetails');

Route::namespace('Api')->group(function() {
  Route::post('/login', 'LoginController@login');
  Route::post('/signup', 'LoginController@signup');
  Route::get('/banners', 'ProductController@banners');
  Route::get('/products', 'ProductController@product_list');
  Route::get('/products/{product}', 'ProductController@products_with_options');
  Route::get('/product-search', 'ProductController@search_product_data');
  Route::get('/categories', 'CategoryController@category_list');
  Route::post('/forgot-password', 'ForgotPasswordController@forgot_password');
  Route::post('/verify-otp', 'ForgotPasswordController@verify_otp');
  Route::post('/create-password', 'ForgotPasswordController@create_password');

  Route::middleware('auth:sanctum')->group(function() {
    Route::post('/change-password', 'UserController@change_password');
    Route::get('/profile', 'UserController@get_user');
    Route::post('/profile', 'UserController@update_user');
    Route::apiResource('address', 'AddressController',);
    Route::post('/cart', 'CartController@add_cart');
    Route::get('/cart', 'CartController@get_cart');
    Route::put('/cart', 'CartController@update_cart');
    Route::delete('/cart/{cart}', 'CartController@delete_cart');
    Route::get('/orders', 'OrderController@my_orders_history');
    Route::get('/order/{order}', 'OrderController@view_order_details');
    Route::post('/single-order', 'OrderController@create_single_order');
    Route::post('/cart-order', 'OrderController@cart_order');
  });
});

// Route::group(['middleware' => 'auth:api'], function(){
//     Route::post('user-details', [UserController::class, 'userDetails']);
// });
