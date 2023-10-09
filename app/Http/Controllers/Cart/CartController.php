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
use App\Models\Order_tracking_shiprocket;
use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\Useraddresses;
class CartController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

   /**
     * Product add to cart items by ajax.
     *
     * @return \Illuminate\Http\Response
    */
    public function add_to_cart_items_by_ajax(Request $request){
        $userId = Auth::user()->id; // or any string represents user identifier
        if($userId){
            $checkcartisempty = Cart::where('user_id',$userId)->count();
            if($checkcartisempty){ //if cart is not empty for session user

                $Product = Product::find($request->productid); // assuming you have a Product model with id, name, description & price
               //find product if already exist in cart table for session user
               $cartdata = Cart::where('user_id',$userId)->where('product_id',$request->productid)->get();
               if(count($cartdata) > 0){ // Record already exist

                if($request->qty == 0){
                    Cart::where('product_id',$request->productid)->delete();
                    echo $Product->name;
                }else{
                    $data = array(
                        'price'             => $Product->sale_price,
                        //'qty'               => $request->qty + $cartdata[0]->qty,
                        'qty'               => $request->qty,
                    );
                    Cart::where('id', $cartdata[0]->id)->update($data);
                    echo $Product->name;
                }

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
                    echo $Product->name;
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
                echo $Product->name;
            }
        }else{
            return redirect('login');
        }
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
                    $cart->image                  = Getimageurllarge($request->productid);
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

        if($request->paymentmethod == "razorpay"){

            $subtotal = 0;
            $cart = Cart::where('user_id',Auth::user()->id)->get();
            foreach($cart as $row){
                $subtotal = $subtotal + ($row->price * $row->qty);
            }
            return redirect()->route('razorpay-payment',['payableamount' => Crypt::encryptString(str_replace(',', '', number_format($subtotal + $request->delivery_charges,2))),"delivery_charges"=>$request->delivery_charges]);
        }else{

        $useraddress = Useraddresses::where('user_id',Auth::user()->id)->where('primary_address','1')->first();
        if($useraddress->address_type == 0){
            $addresstype = "Home";
        } else{
            $addresstype = "Work";
        }



         //1st Save data in order table
         $orderid= "OD".date('Ymd').rand();
         $userid = Auth::user()->id;
         $order = new Order();
             $order->order_id                                      = $orderid;
             $order->user_id                                       = $userid;
             $order->user_phone                                    = Auth::user()->phone;
             $order->user_addresses_title                          = $addresstype;
             $order->user_full_shipping_and_billing_details_info   = $useraddress->address_area_and_street.', State- '.$useraddress->state.', City- '.$useraddress->city_or_district_or_town.', Pin-'.$useraddress->pincode.', Landmark- '.$useraddress->landmark;
             $order->edd                                           = $request->delivery_edd; // Estimated date of delivery
             $order->order_status                                  = 2; // order processing
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


            //4th Save data in order payment capture history
            $orderpaymenthistory = new Order_payment_method();
                $orderpaymenthistory->order_id                         = $orderid;
                $orderpaymenthistory->payment_method                   = $request->paymentmethod;
                $orderpaymenthistory->transaction_id                   = '';
                $orderpaymenthistory->transaction_capture_history      = '';
            $orderpaymenthistory->save();


            $postvalue = array(
                                "order_id" => $orderid,
                                "order_date" => date('Y-m-d H:i'),
                                "pickup_location" => "office",
                                "channel_id" => "3360822",
                                "comment" => "Salesanta Order",
                                "billing_customer_name" => "Biswajit",
                                "billing_last_name" => "Maity",
                                "billing_address" => "jagadishpur,kasbagola, egra",
                                "billing_address_2" => "",
                                "billing_city" => "Egra",
                                "billing_pincode" => "721447",
                                "billing_state" => "West Bengal",
                                "billing_country" => "India",
                                "billing_email" => "software.biswajit@gmail.com",
                                "billing_phone" => "8768624650",
                                "shipping_is_billing" => true,
                                "shipping_customer_name" => "",
                                "shipping_last_name" => "",
                                "shipping_address" => "",
                                "shipping_address_2" => "",
                                "shipping_city" => "",
                                "shipping_pincode" => "",
                                "shipping_country" => "",
                                "shipping_state" => "",
                                "shipping_email" => "",
                                "shipping_phone" => "",
                                "order_items" => $order_items,
                                "payment_method" => "COD",
                                "shipping_charges" => $request->delivery_charges,
                                "giftwrap_charges" => "0",
                                "transaction_charges" => "0",
                                "total_discount" => "0",
                                "sub_total" => $subtotal,
                                "length" => $length,
                                "breadth" => $breadth,
                                "height" => $height,
                                "weight" => $weight
                            );

            //echo "<pre>"; print_r(json_encode($postvalue)); die;

            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://apiv2.shiprocket.in/v1/external/orders/create/adhoc',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS =>json_encode($postvalue),
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.GetShiprocketToken()
              ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            //echo $response;
            $shiprocketresponse = json_decode($response);

            $ordertrackingshiprocket = new Order_tracking_shiprocket();
                $ordertrackingshiprocket->order_id                   = $orderid;
                $ordertrackingshiprocket->shiprocket_order_id        = $shiprocketresponse->order_id;
                $ordertrackingshiprocket->shipment_id                = $shiprocketresponse->shipment_id;
                $ordertrackingshiprocket->status                     = $shiprocketresponse->status;
                $ordertrackingshiprocket->status_code                = $shiprocketresponse->status_code;
                $ordertrackingshiprocket->onboarding_completed_now   = $shiprocketresponse->onboarding_completed_now;
                $ordertrackingshiprocket->awb_code                   = $shiprocketresponse->awb_code;
                $ordertrackingshiprocket->courier_company_id         = $shiprocketresponse->courier_company_id;
                $ordertrackingshiprocket->courier_name               = $shiprocketresponse->courier_name;
            $ordertrackingshiprocket->save();


            $toemail = Auth::user()->email;

            Mail::send('email.order_success_template', ["id"=>$orderid,"order_id"=>$orderid,"payment_method"=>$request->paymentmethod,"user_full_shipping_details_info"=>"Test","user_phone"=>"8768624650"], function($message) use ($toemail){
                $message->to($toemail);
                //$message->bcc('test@salesanta.com');
                $message->subject('Your Order Received Successfully');
            });


            return redirect('/order-success');
        }


    }
    /**
     * Order Success
     *
     * @return \Illuminate\Http\Response
    */
    function order_success(Request $request){
        return view("cart.order-success");
    }













}
