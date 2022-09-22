<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorys;
use App\Models\Subcategoryitem;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Variations;
use App\Models\Variationitems;
use App\Models\Product_with_attribute;
use App\Models\Product_with_attribute_item;

class ApiController extends Controller
{
    public function get_categories()
    {
        $categories = Categorys::with('subcategories')->where('status', 1)->get();
        $catfinal = array();
        if($categories){
            foreach($categories as $c){
                $temp_sub_cat = array();
                if($c->subcategories){
                    foreach($c->subcategories as $sc){
                        $childcat = Subcategoryitem::where('sub_category_id', $sc->id)->get();
                        $sub = array(
                            "id" => $sc->id,
                            "sub_category_name" => $sc->sub_category_name,
                            "sub_category_sort_no" => $sc->sub_category_sort_no,
                            "menu_dropdown" => $sc->menu_dropdown,
                            "menu_show_sub_item" => $sc->menu_show_sub_item,
                            "menu_show_div" => $sc->menu_show_div,
                            "status" => $sc->status,
                            "childcat" =>$childcat
                        );
                        array_push($temp_sub_cat, $sub);
                    }
                }
                $cat = array(
                    "id" => $c->id,
                    "category_name" => $c->category_name,
                    "category_sort_no" =>$c->category_sort_no,
                    "menu_dropdown" => $c->menu_dropdown,
                    "menu_show_div_type" => $c->menu_show_div_type,
                    "menu_show_in_header" => $c->menu_show_in_header,
                    "sub_cat" => $temp_sub_cat
                );
                array_push($catfinal, $cat);
            }
        }

        return response()->json($catfinal, 200);
    }

    public function get_product(Request $request)
    {
        $vendor = $request->ven;
        $cat = $request->cat;
        $subcat = $request->subcat;
        $subcatitem = $request->subcatitem;
        $brand = $request->brand;

        $p = Product::query();
        if ($vendor){
            $p->where('vendor_id',$vendor);
        }
        if ($cat){
            $p->where('category_id',$cat);
        }
        if ($subcat){
            $p->where('sub_category_id',$subcat);
        }
        if ($subcatitem){
            $p->where('sub_category_item_id',$subcatitem);
        }
        if ($brand){
            $p->where('brand',$brand);
        }
        $p->where('status', 1);
        $products = $p->get();
        return response()->json($products, 200);
    }

    public function view_product_details(Request $request){
        $product_id = $request->product_id;
        $product = Product::with('categorys','subcategory','subcategoryitem','vendors','productchildveriation','productchildveriationitem','productwithvariation','productwithvariationitem','productwithattribute','productwithattributeitem')->where('id',$product_id)->first();
        $category = Categorys::where('id', $product->category_id)->first();
        $subcategory = Subcategory::where('id', $product->sub_category_id)->first();
        $subcategoryitem = Subcategoryitem::where('id',$product->sub_category_id)->first();
        $variation = Variations::where('status','1')->get();
        $variationitem = Variationitems::where('status','1')->get();
        $productatwithattribute = Product_with_attribute::where('product_id',$product_id)->get();
        $productatwithattributeitem = Product_with_attribute_item::where('product_id',$product_id)->get();
        //GET PRODUCT Details
        $products = array(
            'product' => $product,
            'category' => $category,
            'subcategory' => $subcategory,
            'subcategoryitem' => $subcategoryitem,
            'variation' => $variation,
            'variationitem' => $variationitem,
            'productatwithattribute' => $productatwithattribute,
            'productatwithattributeitem' => $productatwithattributeitem
        );
        return response()->json($products, 200);
    }
}
