<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_payment_method;
use App\Models\Order_product;
use App\Models\Order_product_tracking;
use App\Models\Order_product_variation;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Nette\Utils\Random;

class OrderController extends Controller
{
    public function create_single_order(Request $request){
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'qty' => 'required',
            'user_phone'=> 'required',
            'user_full_shipping_and_billing_details_info'=> 'required|string',
            'transaction_id'=> 'required',
            'product_shipping_charge'=>'required',
            'product_variation_id'=>'required',
            'product_variation_id'=>'required',
            'product_variation_item_id'=>'required',
            'courier_company'=>'required',
            'tracking_no'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try{
            $product = Product::where('id',$request->product_id)->first();
            $order = new Order();
            $order->order_id = 'Hem'.strval(rand(100000,999999)).strval(date('His'));
            $order->user_id = $request->user()->id;
            $order->user_phone = $request->user_phone;
            $order->user_full_shipping_and_billing_details_info = $request->useruser_full_shipping_and_billing_details_info_phone;
            $order->purchase_date = date("Y/m/d");
            $order->transaction_id = $request->transaction_id;
            $order->save();
            $order->refresh();

            $orderProduct = new Order_product();
            $orderProduct->order_id = $order->id;
            $orderProduct->vendor_id = $product->vendor_id;
            $orderProduct->product_id = $product->id;
            $orderProduct->product_price = $product->price;
            $orderProduct->product_shipping_charge = $request->product_shipping_charge;
            $orderProduct->product_final_price = $product->sale_price;
            $orderProduct->product_quantity = $request->qty;
            $orderProduct->order_date = date("Y/m/d");
            $orderProduct->order_status = 1;
            $orderProduct->transaction_id = $request->transaction_id;
            $orderProduct->save();
            $orderProduct->refresh();

            $orderPaymentMethod = new Order_payment_method();
            $orderPaymentMethod->order_id = $order->id;
            $orderPaymentMethod->payment_method	= $request->payment_method;
            $orderPaymentMethod->transaction_id	= $request->transaction_id;
            $orderPaymentMethod->transaction_capture_history	= $request->transaction_capture_history;
            $orderPaymentMethod->save();

            $orderProductVariations = new Order_product_variation();
            $orderProductVariations->order_id =  $order->id;
            $orderProductVariations->product_id = $product->id;
            $orderProductVariations->product_variation_item_id = $request->product_variation_item_id;
            $orderProductVariations->save();

            $orderProductTracking = new Order_product_tracking();
            $orderProductTracking->order_id = $order->id;
            $orderProductTracking->product_id = $product->id;
            $orderProductTracking->courier_company = $request->courier_company;
            $orderProductTracking->tracking_no = $request->tracking_no;
            $orderProductTracking->save();

            return response()->json(["message"=>'Order saved successfully'],200);
            
        } catch(Exception $e){
            return response()->json(["error"=>$e->getMessage()],500);
        }
    }

    function cart_order(Request $request){
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'qty' => 'required',
            'user_phone'=> 'required',
            'user_full_shipping_and_billing_details_info'=> 'required|string',
            'transaction_id'=> 'required',
            'product_shipping_charge'=>'required',
            'product_variation_id'=>'required',
            'product_variation_id'=>'required',
            'product_variation_item_id'=>'required',
            'courier_company'=>'required',
            'tracking_no'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    }
}
