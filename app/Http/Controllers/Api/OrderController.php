<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_payment_method;
use App\Models\Order_product;
use App\Models\Order_product_tracking;
use App\Models\Order_product_variation;
use App\Models\Order_total;
use App\Models\Order_tracking_shiprocket;
use App\Models\Product;
use App\Models\Useraddresses;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Nette\Utils\Random;

class OrderController extends Controller
{
    public function my_orders_history(Request $request)
    {

        $data = Order::where("user_id",$request->user()->id)
                ->get();
        return response()->json($data,200);

    }
    public function view_order_details(Request $request, $orderid)
     {
         try{
            $data["orderdetails"] = DB::table('orders')->select('orders.id', 'orders.user_addresses_title', 'orders.user_full_shipping_and_billing_details_info', 'orders.order_id','orders.user_phone', 'orders.edd','orders.purchased_date','orders.order_status','order_totals.value')
                                 ->join('order_totals','order_totals.order_id','=','orders.order_id')
                                 ->where('order_totals.title','Total')
                                 ->where('orders.order_id',$orderid)
                                 ->first();

        $data["orderproducts"]       = Order_product::where('order_id',$orderid)->first();
        $data["orderpaymentmethod"]  = Order_payment_method::where('order_id',$orderid)->first();

        $data["ordersubtotals"]      = Order_total::where('order_id',$orderid)->where('title','Sub Total')->first();
        $data["orderdcost"]          = Order_total::where('order_id',$orderid)->where('title','Delivery Charges')->first();
        $data["ordertotals"]         = Order_total::where('order_id',$orderid)->where('title','Total')->first();

        return response()->json($data,200);
         }
         catch(Exception $e){
            return response()->json($e->getMessage(),500);
         }

     }

    function cart_order(Request $request){
        $validator = Validator::make($request->all(), [
            'transaction_id'=> 'required',
            'address_id'=>'required',
            "shiprocket_order_id"=>"required",
            "shipment_id"=>"required",
            "status"=>"required",
            "status_code"=>"required",
            "onboarding_completed_now"=>"required",
            "awb_code"=>"required",
            "courier_company_id"=>"required",
            "courier_name"=>"required",
            "delivery_charges"=>"required"
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try{
            $address = Useraddresses::where("id",$request->address_id)->where("user_id",$request->user()->id)->first();
            //1st Save data in order table
            $orderid= "OD".date('Ymd').rand();
            $userid = $request->user()->id;
            $order = new Order();
                $order->order_id                                      = $orderid;
                $order->user_id                                       = $userid;
                $order->user_phone                                    = $request->user()->phone;
                $order->user_full_shipping_and_billing_details_info   = $address;
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

            $cart = Cart::where('user_id',$request->user()->id)->get();
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
                    $orderproduct->order_status                = '2'; // Order status is received
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
                $orderpaymenthistory->payment_method                   = "razorpayrazorpay";
                $orderpaymenthistory->transaction_id                   = $request->transaction_id;
                $orderpaymenthistory->transaction_capture_history      = '';
            $orderpaymenthistory->save();


            $ordertrackingshiprocket = new Order_tracking_shiprocket();
                $ordertrackingshiprocket->order_id                   = $orderid;
                $ordertrackingshiprocket->shiprocket_order_id        = $request->shiprocket_order_id;
                $ordertrackingshiprocket->shipment_id                = $request->shipment_id;
                $ordertrackingshiprocket->status                     = $request->status;
                $ordertrackingshiprocket->status_code                = $request->status_code;
                $ordertrackingshiprocket->onboarding_completed_now   = $request->onboarding_completed_now;
                $ordertrackingshiprocket->awb_code                   = $request->awb_code;
                $ordertrackingshiprocket->courier_company_id         = $request->courier_company_id;
                $ordertrackingshiprocket->courier_name               = $request->courier_name;
            $ordertrackingshiprocket->save();


            $toemail = $request->user()->email;
            return response()->json(["message"=>'Order saved successfully'],200);
        }catch(Exception $e){
            return response()->json(["message"=>$e->getMessage()],500);
        }
      
    }
}
