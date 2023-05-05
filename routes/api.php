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

Route::post('register', [UserAuthController::class, 'register']);
Route::post('login', [UserAuthController::class, 'login']);

Route::get('getactegories', [ApiController::class, 'get_categories'])->name('allcategories');
Route::get('getproducts', [ApiController::class, 'get_product'])->name('getproducts');
Route::get('getproductdetails', [ApiController::class, 'view_product_details'])->name('getproductsdetails');

Route::namespace('Api')->group(function() {
  Route::post('/login', 'LoginController@login');
  Route::post('/signup', 'LoginController@signup');
  Route::get('/products', 'ProductController@product_list');
  Route::get('/categories', 'CategoryController@category_list');
  Route::post('/cart', 'CartController@add_cart');
});

// Route::group(['middleware' => 'auth:api'], function(){
//     Route::post('user-details', [UserController::class, 'userDetails']);
// });
