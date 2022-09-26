<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

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
        // Check if cart's contents is empty for a specific user
        $userId = auth()->user()->id; // or any string represents user identifier
        $checkcartisempty = \Cart::session($userId)->isEmpty();

        if($checkcartisempty){

            //check product data already exist or not
            $Product = Product::find($request->productid); // assuming you have a Product model with id, name, description & price
            $rowId = mt_rand(); // generate a unique() row ID
            $userID = Auth::user()->id; // the user ID to bind the cart contents

            // add the product to cart
            \Cart::session($userID)->add(array(
                'id' => $rowId,
                'name' => $Product->name,
                'price' => $Product->sale_price,
                'quantity' => $request->qty,
                'attributes' => array(),
                'associatedModel' => $Product
            ));
        }else{



        }

        return redirect('cart');
    }

   /**
     * View cart details page.
     *
     * @return \Illuminate\Http\Response
    */
    public function cart(){
        return view("cart.cart");
    }

}
