<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\LogoutController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/clear-cache', function() {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', [AdminLoginController::class, 'index'])->name('admin.login');
    Route::post('/admin/login', [AdminLoginController::class, 'postlogin'])->name('adminLoginPost');
 });

Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin/dashboard');
Route::get('/admin/logout', [LogoutController::class, 'adminlogout'])->name('/admin/logout');


// Admin Category
Route::get('/admin/category', [CategoryController::class, 'category_list'])->name('admin/category');

Route::get('/admin/add-category',[CategoryController::class, 'add_category'])->name('admin/add-category');
Route::post('/admin/add-category-post-data',[CategoryController::class, 'add_category_post_data'])->name('admin/add-category-post-data');

Route::any('/admin/edit-category/{categoryid}',[CategoryController::class, 'edit_category'])->name('admin/edit-category');
Route::post('/admin/edit-category-post/{categoryid}',[CategoryController::class, 'edit_category_post'])->name('admin/edit-category-post');

Route::any('/admin/delete-category/{categoryid}',[CategoryController::class, 'delete_category'])->name('admin/delete-category');
