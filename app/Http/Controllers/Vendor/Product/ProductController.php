<?php

namespace App\Http\Controllers\Vendor\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth:vendor');
    }

     /**
     * Show the vendor product view page.
     *
     * @return \Illuminate\Http\Response
     */
	public function product_list(Request $request){
		return view("vendor.product.product-list");
	}

    /**
     * Show the vendor add product view page.
     *
     * @return \Illuminate\Http\Response
     */
	public function add_product(Request $request){
        // $category = Categorys::where('status','1')->orderBy('category_name')->get();
		// return view("admin.subcategoryitem.add-sub-category-item",compact('category'));

		return view("vendor.product.add-product");
	}

    public function add_product_post_data(Request $request){

    }

}
