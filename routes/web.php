<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\VendorLoginController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Vendor\Variations\VariationsController;
use App\Http\Controllers\Vendor\Variationitems\VariationitemsController;

use App\Http\Controllers\Vendor\CatController;

use App\Http\Controllers\Vendor\Dashboard\VendorDashboardController;
use App\Http\Controllers\Admin\Subcategoryitem\SubCategoryItemController;
use App\Http\Controllers\Admin\Subcategory\SubCategoryController;
use App\Http\Controllers\Admin\Attributecategory\AttributecategoryController;
use App\Http\Controllers\Admin\Attribute\AttributeController;
use App\Http\Controllers\Vendor\Product\ProductController;
use App\Http\Controllers\Admin\LogoutController;

use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\HomeController;

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


Route::get('/clear-cache', function() {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Auth::routes();

/**
 *
 * Admin section start
 *
 */

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





// Admin Attribute Category Heading
Route::get('/admin/attribute', [AttributecategoryController::class, 'attribute_list'])->name('attribute.category');

Route::get('/admin/add-attribute',[AttributecategoryController::class, 'add_attribute'])->name('admin.add-attribute');
Route::post('/admin/add-attribute-post-data',[AttributecategoryController::class, 'add_attribute_post_data'])->name('admin.add-attribute-post-data');

Route::get('/admin/edit-attribute/{attributecatid}',[AttributecategoryController::class, 'edit_attribute'])->name('admin.edit-attribute');
Route::post('/admin/edit-attribute-post',[AttributecategoryController::class, 'edit_attribute_post'])->name('admin.edit-attribute-post');

Route::any('/admin/attribute-trash/{attributecatid}',[AttributecategoryController::class, 'attribute_trash'])->name('admin.attribute-trash');


Route::get('/admin/searchattributecategory', [AttributecategoryController::class, 'searchattributecategory'])->name('admin.searchattributecategory');
Route::any('/admin/attributecategorylistajax', [AttributecategoryController::class, 'ajax_get_list_attribute_category_by_cat_subcat_subcatitem_wise'])->name('admin.attributecategorylistajax');  // GET Subcategory LIST on attribute page
Route::any('/admin/getsubcategoryonattributepage', [AttributecategoryController::class, 'ajax_sub_category_get_category_id_on_attribute_page'])->name('admin.getsubcategoryonattributepage');  // GET Subcategory LIST
Route::any('/admin/getsubcategoryitemonattributepage', [AttributecategoryController::class, 'ajax_sub_category_item_get_category_id_on_attribute_page'])->name('admin.getsubcategoryitemonattributepage');  // GET Subcategory Item LIST



// Admin Attribute field's
Route::get('/admin/attribute-items', [AttributeController::class, 'attribute_items_list'])->name('attribute-items');

Route::get('/attributelist', [AttributeController::class, 'attributelistdata'])->name('attributelist');

Route::get('/admin/add-attribute-items',[AttributeController::class, 'add_attribute_items'])->name('admin.add-attribute-items');
Route::post('/admin/add-attribute-items-post-data',[AttributeController::class, 'add_attribute_items_post_data'])->name('admin.add-attribute-items-post-data');

Route::any('/admin/edit-attribute-items/{attributeid}',[AttributeController::class, 'edit_attribute_items'])->name('admin.edit-attribute-items');
Route::post('/admin/edit-attribute-items-post',[AttributeController::class, 'edit_attribute_items_post'])->name('admin.edit-attribute-items-post');

Route::any('/admin/attribute-items-trash/{attributeid}',[AttributeController::class, 'attributeitemstrash'])->name('admin.attribute-item-trash');

Route::get('/admin/searchattribute', [AttributeController::class, 'searchattribute'])->name('admin.searchattribute');

Route::any('/admin/getsubcategoryattribute', [AttributeController::class, 'ajax_sub_category_get_category_id'])->name('admin.getsubcategoryattribute');  // GET Subcategory LIST on attribute page
//Route::any('/admin/getsubcategoryattribute', [AttributeController::class, 'ajax_sub_category_get_category_id'])->name('admin.getsubcategoryattribute');  // GET Subcategory LIST on attribute page

Route::any('/admin/getsubcategoryitemattribute', [AttributeController::class, 'ajax_sub_category_item_get_category_id'])->name('admin.getsubcategoryitemattribute');  // GET Subcategory Item LIST on attribute page
Route::any('/admin/getattributecategory', [AttributeController::class, 'ajax_getattributecategory'])->name('admin.getattributecategory');
Route::any('/admin/getattributecategorysearch', [AttributeController::class, 'ajax_getattributecategorysearch'])->name('admin.getattributecategorysearch');



// Admin Brand
Route::get('/admin/brand', [BrandController::class, 'brand_list'])->name('admin.brand');

Route::get('/admin/add-brand',[BrandController::class, 'add_brand'])->name('admin.add-brand');
Route::post('/admin/add-brand-post-data',[BrandController::class, 'add_brand_post_data'])->name('admin.add-brand-post-data');

Route::get('/admin/edit-brand/{brandid}',[BrandController::class, 'edit_brand'])->name('admin.edit-brand');
Route::post('/admin/edit-brand-post',[BrandController::class, 'edit_brand_post'])->name('admin.edit-brand-post');

Route::any('/admin/brand-trash/{brandid}',[BrandController::class, 'brand_trash'])->name('admin.brand-trash');

Route::any('/admin/brand-list-search', [BrandController::class, 'brand_list_search'])->name('admin.brand-list-search');
Route::any('/admin/search-brand-list-datatable', [BrandController::class, 'ajax_search_brand_list_datatable'])->name('admin.search-brand-list-datatable');


/**
 *
 * Admin section End
 *
 */





/**
 *
 * Vendor section start
 *
 */


 Route::group(['middleware' => ['vendor']], function () {
    Route::get('/vendor', [VendorLoginController::class, 'index'])->name('vendor.login');
    Route::post('/vendor/login', [VendorLoginController::class, 'postvendorlogin'])->name('vendorLoginPost');
 });
 Route::get('/vendor/dashboard', [VendorDashboardController::class, 'dashboard'])->name('vendor/dashboard');
 Route::get('/vendor/logout', [VendorLogoutController::class, 'vendorlogout'])->name('/vendor/logout');


 //GET ALL CATEGORY / SUB CATEGORY / SUB CATEGORY ITEM / VARIATION /VARIATION ITEM
 Route::any('/vendor/getsubcategory', [CatController::class, 'ajax_get_sub_category'])->name('vendor.getsubcategory');  // GET Subcategory LIST
 Route::any('/vendor/getsubcategoryitem', [CatController::class, 'ajax_getsubcategoryitem'])->name('vendor.getsubcategoryitem');  // GET Subcategory Item LIST
 Route::any('/vendor/getsubcategorycpt', [CatController::class, 'ajax_getsubcategorycpt'])->name('vendor.getsubcategorycpt');  // GET Subcategory LIST
 Route::any('/vendor/getsubcategoryitemcpt', [CatController::class, 'ajax_getsubcategoryitemcpt'])->name('vendor.getsubcategoryitemcpt');  // GET Subcategory Item LIST




// Vendor Variation
Route::get('/vendor/variation', [VariationsController::class, 'variation_list'])->name('vendor.variation');

Route::get('/vendor/add-variation',[VariationsController::class, 'add_variation'])->name('vendor.add-variation');
Route::post('/vendor/add-variation-post-data',[VariationsController::class, 'add_variation_post_data'])->name('vendor.add-variation-post-data');

Route::get('/vendor/edit-variation/{variationid}',[VariationsController::class, 'edit_variation'])->name('vendor.edit-variation');
Route::post('/vendor/edit-variation-post',[VariationsController::class, 'edit_variation_post'])->name('vendor.edit-variation-post');

Route::any('/vendor/variation-trash/{variationid}',[VariationsController::class, 'variation_trash'])->name('vendor.variation-trash');

Route::get('/vendor/searchvariation', [VariationsController::class, 'searchvariation'])->name('vendor.searchvariation');
Route::any('/vendor/searchvariationajax', [VariationsController::class, 'searchvariation_list_ajax'])->name('vendor.searchvariationajax');


// Vendor Variation Items field's
Route::get('/vendor/variation-items', [VariationitemsController::class, 'variationitem_list'])->name('variation-items');

Route::get('/searchvariationitemlist', [VariationitemsController::class, 'variationitemlistdata'])->name('vendor.searchvariationitemlist');
Route::get('/searchvariationitemlistajax', [VariationitemsController::class, 'searchvariationitemlist_list_ajax'])->name('searchvariationitemlistajax');


Route::get('/vendor/add-variationitem',[VariationitemsController::class, 'add_variationitem'])->name('vendor.add-variationitem');
Route::post('/vendor/add-variationitem-post-data',[VariationitemsController::class, 'add_variationitem_post_data'])->name('vendor.add-variationitem-post-data');

Route::any('/vendor/edit-variationitem/{variationitemid}',[VariationitemsController::class, 'edit_variationitem'])->name('vendor.edit-variationitem');
Route::post('/vendor/edit-variationitem-post',[VariationitemsController::class, 'edit_variationitem_post'])->name('vendor.edit-variationitem-post');

Route::any('/vendor/variationitemtrash/{variationitemid}',[VariationitemsController::class, 'variationitemtrash'])->name('vendor.variationitemtrash');

Route::post('/vendor/getvariation', [VariationitemsController::class, 'ajax_getvariation'])->name('vendor.getvariation');
Route::any('/vendor/getvariationBysubcategoryitem', [VariationitemsController::class, 'ajax_getvariationBysubcategoryitem'])->name('vendor.getvariationBysubcategoryitem');


 // Vendor Products
 Route::get('/vendor/products', [ProductController::class, 'product_list'])->name('products');

// Route::get('/productlist', [ProductController::class, 'productdata'])->name('productlist');
 Route::get('/vendor/add-product-category',[ProductController::class, 'add_product_category'])->name('vendor.add-product-category');
 Route::get('/vendor/add-product',[ProductController::class, 'add_product'])->name('vendor.add-product');
 Route::post('/vendor/add-product-post-data',[ProductController::class, 'add_product_post_data'])->name('vendor.add-product-post-data');

// Route::any('/vendor/edit-product/{attributeid}',[ProductController::class, 'edit_product'])->name('vendor.edit-product');
// Route::post('/vendor/edit-product-post',[ProductController::class, 'edit_product_post'])->name('vendor.edit-product-post');

// Route::any('/vendor/producttrash/{attributeid}',[ProductController::class, 'producttrash'])->name('vendor.producttrash');

Route::any('/admin/get_sub_category_on_product_page', [ProductController::class, 'ajax_get_sub_category_on_product_page'])->name('admin.get_sub_category_on_product_page');  // GET Subcategory LIST
Route::any('/admin/get_sub_category_item_on_product_page', [ProductController::class, 'ajax_get_sub_category_item_on_product_page'])->name('admin.get_sub_category_item_on_product_page');  // GET Subcategory item LIST
Route::any('/admin/get_attributecat_with_attribute_on_product_page', [ProductController::class, 'ajax_get_attributecat_with_attribute_on_product_page'])->name('admin.get_attributecat_with_attribute_on_product_page');  // GET attribute LIST


/**
 *
 * Vendor section end
 *
 */



 /**
 *
 * Frontend section start
 *
 */
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/category-wise-landing-page',[HomeController::class, 'category_wise_landing_page'])->name('home.category-wise-landing-page');
    Route::get('/sub-category-wise-page',[HomeController::class, 'sub_category_wise_page'])->name('home.sub-category-wise-page');
    Route::get('/view-product-details',[HomeController::class, 'view_product_details'])->name('home.view-product-details');


  /**
 *
 * Frontend section end
 *
 */
