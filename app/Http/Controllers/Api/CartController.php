<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Product_image;
use Exception;
use Facade\FlareClient\Http\Response;
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
            $product = Product::where("id",'=',$request->product_id)->first();
            $product_image = Product_image::where('product_id','=',$request->product_id)->first();
            
            $cart = Cart::create([
                'product_id'=>$request->product_id,
                'user_id'=>$request->user()->id,
                'qty'=>$request->qty,
                "name"=>$product->name,
                "attributes"=>$request->attribute,
                "price"=>$product->price,
                'image'=>$product_image->image_url,
            ]);
            return response()->json($cart,200);
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
    }
    public function get_cart(Request $request){
        try{
            $cart = Cart::where('user_id','=',$request->user()->id)->get();
            return response()->json($cart,200);
        }
        catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
    }
    public function update_cart(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            "qty"=> 'required|integer',
            'attribute' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json( $validator->errors(), 422);
        }
        try{
            $cart = Cart::where('id',$request->id)->where('user_id',$request->user()->id)->first();
            $cart->qty = $request->qty;
            $cart->attributes = $request->attribute;
            $cart->save();
            return response()->json(["message"=>"Cart updated successfully"],200);
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
    }
    public function delete_cart(Request $request, Cart $cart){
        try{
            $data = Cart::where('id',$cart->id)->where('user_id',$request->user()->id)->forceDelete();
            return response()->json(["message"=>"Cart deleted successfully"],200);
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
    }
}
