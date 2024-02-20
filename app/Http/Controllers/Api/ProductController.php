<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Banner;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function product_list(Request $request)
    {
        try{
            $products = Product::join('product_images','products.id','=','product_images.product_id')
            ->get();
            return response()->json($products,200);
        }catch(Exception $e){
            return response()->json(["error"=>$e->getMessage()],500);
        }
    } 
    public function search_product_data(Request $request)
    {
        try{
            $key = $request->key;
            $products = Product::where('name', 'like', "%{$key}%")
            ->join('product_images','products.id','=','product_images.product_id')
            ->get();
            return response()->json($products,200);
        }catch(Exception $e){
            return response()->json(["error"=>$e->getMessage()],500);
        }
    } 

    public function products_with_options(Request $request, Product $product){
     try{
        return response()->json(new ProductResource($product), 200);
       } catch(Exception $e) {
        return response()->json(['error'=>$e->getMessage()],500);
       }
    }
    public function banners(Request $request){
        try{
            $data = Banner::all();
            return response()->json($data, 200);
        } catch(Exception $e) {
            return response()->json(['error'=>$e->getMessage()],500);
        }
    }
}
