<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Subcategoryitem\SubCategoryItemController;
use App\Http\Controllers\Admin\Subcategory\SubCategoryController;
use App\Http\Controllers\Admin\Attribute\AttributeController;

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
Route::get('/admin/category', [CategoryController::class, 'category_list'])->name('admin.category');

Route::get('/categorylist', [CategoryController::class, 'categorylistdata'])->name('categorylist');

Route::get('/admin/add-category',[CategoryController::class, 'add_category'])->name('admin.add-category');
Route::post('/admin/add-category-post-data',[CategoryController::class, 'add_category_post_data'])->name('admin.add-category-post-data');

Route::any('/admin/edit-category/{categoryid}',[CategoryController::class, 'edit_category'])->name('admin.edit-category');
Route::post('/admin/edit-category-post',[CategoryController::class, 'edit_category_post'])->name('admin.edit-category-post');

Route::any('/admin/categorytrash/{categoryid}',[CategoryController::class, 'categorytrash'])->name('admin.categorytrash');

//Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
//Route::get('posts/restore/{id}', [PostController::class, 'restore'])->name('posts.restore');
//Route::get('posts/restore-all', [PostController::class, 'restoreAll'])->name('posts.restoreAll');


// Admin Sub Category
Route::get('/admin/sub-category', [SubCategoryController::class, 'sub_category_list'])->name('admin.subcategory');

Route::get('/subcategorylist', [SubCategoryController::class, 'subcategorylistdata'])->name('subcategorylist');

Route::get('/admin/add-sub-category',[SubCategoryController::class, 'add_sub_category'])->name('admin.add-sub-category');
Route::post('/admin/add-sub-category-post-data',[SubCategoryController::class, 'add_sub_category_post_data'])->name('admin.add-sub-category-post-data');

Route::any('/admin/edit-sub-category/{subcategoryid}',[SubCategoryController::class, 'edit_sub_category'])->name('admin.edit-sub-category');
Route::post('/admin/edit-sub-category-post',[SubCategoryController::class, 'edit_sub_category_post'])->name('admin.edit-sub-category-post');

Route::any('/admin/subcategorytrash/{subcategoryid}',[SubCategoryController::class, 'subcategorytrash'])->name('admin.subcategorytrash');



// Admin Sub Category Item
Route::get('/admin/sub-category-item', [SubCategoryItemController::class, 'sub_category_item_list'])->name('admin.subcategoryitem');

Route::get('/subcategoryitemlist', [SubCategoryItemController::class, 'subcategoryitemlistdata'])->name('subcategoryitemlist');

Route::get('/admin/add-sub-category-item',[SubCategoryItemController::class, 'add_sub_category_item'])->name('admin.add-sub-category-item');
Route::post('/admin/add-sub-category-item-post-data',[SubCategoryItemController::class, 'add_sub_category_item_post_data'])->name('admin.add-sub-category-item-post-data');

Route::any('/admin/edit-sub-category-item/{subcategoryitemid}',[SubCategoryItemController::class, 'edit_sub_category_item'])->name('admin.edit-sub-category-item');
Route::post('/admin/edit-sub-category-item-post',[SubCategoryItemController::class, 'edit_sub_category_item_post'])->name('admin.edit-sub-category-item-post');

Route::any('/admin/subcategoryitemtrash/{subcategoryitemid}',[SubCategoryItemController::class, 'subcategoryitemtrash'])->name('admin.subcategoryitemtrash');

Route::any('/admin/getsubcategory', [SubCategoryItemController::class, 'ajax_sub_category_get_category_id'])->name('admin.getsubcategory');  // GET Subcategory LIST


// Admin Attribute
Route::get('/admin/attribute', [AttributeController::class, 'attribute_list'])->name('attribute');

 Route::get('/attributelist', [AttributeController::class, 'attributelistdata'])->name('attributelist');

 Route::get('/admin/add-attribute',[AttributeController::class, 'add_attribute'])->name('admin.add-attribute');
 Route::post('/admin/add-attribute-post-data',[AttributeController::class, 'add_attribute_post_data'])->name('admin.add-attribute-post-data');

 Route::any('/admin/edit-attribute/{attributeid}',[AttributeController::class, 'edit_attribute'])->name('admin.edit-attribute');
 Route::post('/admin/edit-attribute-post',[AttributeController::class, 'edit_attribute_post'])->name('admin.edit-attribute-post');

 Route::any('/admin/attributetrash/{attributeid}',[AttributeController::class, 'attributetrash'])->name('admin.attributetrash');
