<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_product;
use App\Models\Order_payment_method;
use App\Models\Order_product_variation;
use App\Models\Order_product_feedback;
use App\Models\Order_product_tracking;
use App\Models\Order_total;
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
                $attributes = array('sku'=>$Product->sku,'weight'=>$Product->weight,'length'=>$Product->length,'breadth'=>$Product->breadth,'height'=>$Product->height,'vendor_id'=>$Product->vendor_id);
                $attribute_String = json_encode($attributes);
                $cart = new Cart();
                    $cart->user_id                = $userId;
                    $cart->product_id             = $request->productid;
                    $cart->name                   = $Product->name;
                    $cart->price                  = $Product->sale_price;
                    $cart->qty                    = $request->qty;
                    $cart->image                  = Getimageurllarge($request->productid);
                    $cart->attributes             = $attribute_String;
                $cart->save();
               }
            }else{

                $Product = Product::find($request->productid); // assuming you have a Product model with id, name, description & price
                $attributes = array('sku'=>$Product->sku,'weight'=>$Product->weight,'length'=>$Product->length,'breadth'=>$Product->breadth,'height'=>$Product->height,'vendor_id'=>$Product->vendor_id);
                $attribute_String = json_encode($attributes);
                $cart = new Cart();
                    $cart->user_id                = $userId;
                    $cart->product_id             = $request->productid;
                    $cart->name                   = $Product->name;
                    $cart->price                  = $Product->sale_price;
                    $cart->qty                    = $request->qty;
                    $cart->image                  = Getimageurllarge($request->productid);
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
     * View cart details page.
     *
     * @return \Illuminate\Http\Response
    */
    public function update_cart(Request $request){
        if(Auth::user()->id){

            if($request->rowid){
                foreach($request->rowid as $key => $value){

                    $data = array(
                        'qty'               => $request->quantity[$key],
                    );
                    Cart::where('id', $value)->update($data);

                }
            }
            return redirect('cart');
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

   /**
     * View cart checkout page.
     *
     * @return \Illuminate\Http\Response
    */
    public function checkout(Request $request){
        if(Auth::user()->id){
            $cart = Cart::where('user_id',Auth::user()->id)->get();
            return view("cart.checkout",compact('cart'));
        }else{
            return redirect('login');
        }
    }

    /**
     * Order Store
     *
     * @return \Illuminate\Http\Response
    */
    function order_store(Request $request){


        //1st Save data in order table
        $orderid= "OD".date('Ymd').rand();
        $userid = Auth::user()->id;
    	$order = new Order();
            $order->order_id                                      = $orderid;
            $order->user_id                                       = $userid;
            $order->user_phone                                    = Auth::user()->phone;
            $order->user_full_shipping_and_billing_details_info   = 'Test';
            $order->purchased_date                                = date('Y-m-d H:i:s');
		$order->save();
        //$orderid= $order->id;

        //2nd Save data in order_products
        $total = 0;
        $subtotal = 0;
        $weight = 0;
        $length = 0;
        $breadth = 0;
        $height = 0;
        //$order_items = array();

        $cart = Cart::where('user_id',Auth::user()->id)->get();
        foreach($cart as $row){
            $subtotal = $subtotal + ($row->price * $row->qty);
            $productinfo = json_decode($row->attributes);

            $weight      = $weight + ($productinfo->weight * $row->qty);
            $length      = $length + $productinfo->length;
            $breadth     = $breadth + $productinfo->breadth;
            $height      = $height + $productinfo->height;

            $orderproduct = new Order_product();
                $orderproduct->order_id                    = $orderid;
                $orderproduct->vendor_id                   = $productinfo->vendor_id;
                $orderproduct->product_id                  = $row->product_id;
                $orderproduct->product_price               = $row->price;
                $orderproduct->product_tax_price           = '0.00';
                $orderproduct->product_shipping_charge     = '0.00';
                $orderproduct->product_final_price         = $row->price;
                $orderproduct->product_quantity            = $row->qty;
                $orderproduct->order_date                  = date('Y-m-d H:i:s');
                $orderproduct->order_status                = '1'; // Default order status is pending
            $orderproduct->save();

            $order_items[] = array('name'=>$row->name,'sku'=>$productinfo->sku,'units'=>$row->qty,'selling_price'=>$row->price,'discount'=>'','tax'=>'','hsn'=>'');

        }

        //3rd Save data in order_totals
    	$ordersubtotal = new Order_total();
            $ordersubtotal->order_id   = $orderid;
            $ordersubtotal->title      = 'Sub Total';
            $ordersubtotal->text       = 'Sub Total';
            $ordersubtotal->value      = str_replace(',', '', $subtotal);
		$ordersubtotal->save();

    	$orderdeliverycost = new Order_total();
            $orderdeliverycost->order_id   = $orderid;
            $orderdeliverycost->title      = 'Delivery Charges';
            $orderdeliverycost->text       = 'Delivery Charges';
            $orderdeliverycost->value      = $request->delivery_charges;
		$orderdeliverycost->save();

    	$ordertotal = new Order_total();
            $ordertotal->order_id   = $orderid;
            $ordertotal->title      = 'Total';
            $ordertotal->text       = 'Total';
            $ordertotal->value      = str_replace(',', '', number_format($subtotal + $request->delivery_charges,2));
		$ordertotal->save();


        if($request->paymentmethod == "razorpay"){
            return redirect()->route('razorpay-payment',['payableamount' => str_replace(',', '', number_format($subtotal + $request->delivery_charges,2))]);

        }else{
            //4th Save data in order payment capture history
            $orderpaymenthistory = new Order_payment_method();
                $orderpaymenthistory->order_id                         = $orderid;
                $orderpaymenthistory->payment_method                   = $request->paymentmethod;
                $orderpaymenthistory->transaction_id                   = '';
                $orderpaymenthistory->transaction_capture_history      = '';
            $orderpaymenthistory->save();
        }



    //    $curl = curl_init();

    //    curl_setopt_array($curl, array(
    //      CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/orders/create/adhoc',
    //      CURLOPT_RETURNTRANSFER => true,
    //      CURLOPT_ENCODING => '',
    //      CURLOPT_MAXREDIRS => 10,
    //      CURLOPT_TIMEOUT => 0,
    //      CURLOPT_FOLLOWLOCATION => true,
    //      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //      CURLOPT_CUSTOMREQUEST => 'POST',
    //      CURLOPT_POSTFIELDS =>'{
    //             "order_id": "224-4779",
    //             "order_date": "2023-06-16 12:44",
    //             "pickup_location": "office",
    //             "channel_id": "3360822",
    //             "comment": "Reseller: M/s Goku",
    //             "billing_customer_name": "Naruto",
    //             "billing_last_name": "Uzumaki",
    //             "billing_address": "House 221B, Leaf Village",
    //             "billing_address_2": "Near Hokage House",
    //             "billing_city": "New Delhi",
    //             "billing_pincode": "713216",
    //             "billing_state": "Delhi",
    //             "billing_country": "India",
    //             "billing_email": "naruto@uzumaki.com",
    //             "billing_phone": "9876543210",
    //             "shipping_is_billing": true,
    //             "shipping_customer_name": "",
    //             "shipping_last_name": "",
    //             "shipping_address": "",
    //             "shipping_address_2": "",
    //             "shipping_city": "",
    //             "shipping_pincode": "",
    //             "shipping_country": "",
    //             "shipping_state": "",
    //             "shipping_email": "",
    //             "shipping_phone": "",
    //             "order_items": [
    //               {
    //                 "name": "Kunai",
    //                 "sku": "chakra123",
    //                 "units": 10,
    //                 "selling_price": "900",
    //                 "discount": "",
    //                 "tax": "",
    //                 "hsn": 441122
    //               }
    //             ],
    //             "payment_method": "Prepaid",
    //             "shipping_charges": 0,
    //             "giftwrap_charges": 0,
    //             "transaction_charges": 0,
    //             "total_discount": 0,
    //             "sub_total": 9000,
    //             "length": 10,
    //             "breadth": 15,
    //             "height": 20,
    //             "weight": 2.5
    //           }',
    //      CURLOPT_HTTPHEADER => array(
    //        'Content-Type: application/json',
    //        'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMwNjQ0OTgsImlzcyI6Imh0dHBzOi8vYXBpdjIuc2hpcHJvY2tldC5pbi92MS9leHRlcm5hbC9hdXRoL2xvZ2luIiwiaWF0IjoxNjg2MDUwMjY2LCJleHAiOjE2ODY5MTQyNjYsIm5iZiI6MTY4NjA1MDI2NiwianRpIjoiRG5JSkdFem5zMjZtWG5JWCJ9.6e94-skdCUxv5eBXm53CmEtgbeYa0ACcy7PiheT_5Q0'
    //      ),
    //    ));

    //    $response = curl_exec($curl);

    //    curl_close($curl);
    //    echo $response;


    }
}
