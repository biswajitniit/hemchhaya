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
            'vendor'=> 'required',
            'user_phone'=> 'required',
            'user_full_shipping_and_billing_details_info'=> 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try{
            $product = Product::where('id',$request->product_id);
            $order = new Order();
            $orderProduct = new Order_product();
            $orderPaymentMethod = new Order_payment_method();
            $orderProductVariations = new Order_product_variation();
            $orderProductTracking = new Order_product_tracking();
            
        } catch(Exception $e){
            return response()->json(["error"=>$e->getMessage()],500);
        }
    }
}
