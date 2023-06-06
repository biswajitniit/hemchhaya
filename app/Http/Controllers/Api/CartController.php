<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Product_image;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function add_cart(Request $request){
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            "qty"=> 'required|integer',
            'attribute' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json( $validator->errors(), 422);
        }
        try{
            $product = Product::where("id",'=',$request->product_id);
            $product_image = Product_image::where('product_id','=',$request->product_id);
            
            $cart = Cart::create([
                'product_id'=>$request->product_id,
                'user_id'=>$request->user()->id,
                'qty'=>$request->qty,
                "name"=>$product->name,
                "attribute"=>$request->attribute,
                "price"=>$product->price * $request->qty,
                'image'=>$product_image->image_url,
            ]);
            return response()->json($cart,200);
        }catch(Exception $e){
            return response()->json($e,500);
        }
    }
    public function get_cart(Request $request){
        $cart = Cart::where('user_id','=',$request->user()->id)->get();
        
    }
}
