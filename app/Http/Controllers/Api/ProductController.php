<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product_list(Request $request)
    {
        try{
            if(!empty($request->category_id)){
                if(!empty($request->sub_category_id)){
                    $products = Product::where("category_id","=",$request->category_id)
                    ->where("sub_category_id","=",$request->sub_category_id)
                    ->get();
                    return response()->json($products,200);
                }
                $products = Product::where("category_id","=",$request->category_id)->get();
                return response()->json($products,200);
            }
            $products = Product::get();
            return response()->json($products,200);
        }catch(Exception $e){
            return response()->json(["message"=>"$e"],500);
        }
    } 
}
