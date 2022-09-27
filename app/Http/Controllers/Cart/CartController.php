<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use DB;
use Illuminate\Support\Facades\Crypt;

class CartController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

   /**
     * Product add to cart.
     *
     * @return \Illuminate\Http\Response
    */
    public function add_to_cart_items(Request $request){
        $userId = Auth::user()->id; // or any string represents user identifier
        if($userId){
            $checkcartisempty = Cart::where('user_id',$userId)->count();
            if($checkcartisempty){ //if cart is not empty for session user

                $Product = Product::find($request->productid); // assuming you have a Product model with id, name, description & price
               //find product if already exist in cart table for session user
               $cartdata = Cart::where('user_id',$userId)->where('product_id',$request->productid)->get();
               if(count($cartdata) > 0){ // Record already exist
                $data = array(
                    'price'             => $Product->sale_price,
                    'qty'               => $request->qty + $cartdata[0]->qty,
                );
                Cart::where('id', $cartdata[0]->id)->update($data);

               }else{ // If this product is not added to cart
                $Product = Product::find($request->productid); // assuming you have a Product model with id, name, description & price
                $attributes = array();
                $attribute_String = json_encode($attributes);

                $cart = new Cart();
                    $cart->user_id                = $userId;
                    $cart->product_id             = $request->productid;
                    $cart->name                   = $Product->name;
                    $cart->price                  = $Product->sale_price;
                    $cart->qty                    = $request->qty;
                    $cart->image                  = $Product->front_view_image;
                    $cart->attributes             = $attribute_String;
                $cart->save();

               }

            }else{

                $Product = Product::find($request->productid); // assuming you have a Product model with id, name, description & price
                $attributes = array('size'=>30,'color'=>'red');
                $attribute_String = json_encode($attributes);

                $cart = new Cart();
                    $cart->user_id                = $userId;
                    $cart->product_id             = $request->productid;
                    $cart->name                   = $Product->name;
                    $cart->price                  = $Product->sale_price;
                    $cart->qty                    = $request->qty;
                    $cart->image                  = $Product->front_view_image;
                    $cart->attributes             = $attribute_String;
                $cart->save();

            }
            return redirect('cart');
        }else{
            return redirect('login');
        }

    }

   /**
     * View cart details page.
     *
     * @return \Illuminate\Http\Response
    */
    public function cart(){
        if(Auth::user()->id){
            $cart = Cart::where('user_id',Auth::user()->id)->get();
            return view("cart.cart",compact('cart'));
        }else{
            return redirect('login');
        }

    }

   /**
     * Remove cart items
     *
     * @return \Illuminate\Http\Response
    */
    public function remove_cart_item(Request $request){
        Cart::where('id',Crypt::decryptString($request->rowid))->delete();
        return redirect()->back()->with('message', 'Record deleted successfully.');
    }


}
