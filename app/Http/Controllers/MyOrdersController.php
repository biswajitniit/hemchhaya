<?php

namespace App\Http\Controllers;

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


class MyOrdersController extends Controller
{
	public function __construct()
    {
       $this->middleware('auth');
    }

    /**
     * MY ORDER HISTORY PAGE
     *
     * @return true or false
     */
     public function my_orders_history()
     {

         $data["orderdetails"] = DB::table('orders')->select('orders.id','orders.order_id','orders.user_phone','orders.purchased_date', 'orders.edd', 'order_totals.value')
                                 ->join('order_totals','order_totals.order_id','=','orders.order_id')
                                 ->where('order_totals.title','Total')
                                 ->where('orders.user_id',Auth::user()->id)
                                 ->where('orders.order_status','!=','1')
                                 ->get();
        return view('dashboardarea.my-orders-history',$data);

     }

     /**
     * MY ORDER HISTORY PAGE
     *
     * @return true or false
     */

     public function view_order_details(Request $request, $orderid)
     {
         $data["orderdetails"] = DB::table('orders')->select('orders.id', 'orders.user_addresses_title', 'orders.user_full_shipping_and_billing_details_info', 'orders.order_id','orders.user_phone', 'orders.edd','orders.purchased_date','orders.order_status','order_totals.value')
                                 ->join('order_totals','order_totals.order_id','=','orders.order_id')
                                 ->where('order_totals.title','Total')
                                 ->where('orders.order_id',$orderid)
                                 ->get()[0];

        $data["orderproducts"]       = Order_product::where('order_id',$orderid)->get();
        $data["orderpaymentmethod"]  = Order_payment_method::where('order_id',$orderid)->first();

        $data["ordersubtotals"]      = Order_total::where('order_id',$orderid)->where('title','Sub Total')->get()[0]->value;
        $data["orderdcost"]          = Order_total::where('order_id',$orderid)->where('title','Delivery Charges')->get()[0]->value;
        $data["ordertotals"]         = Order_total::where('order_id',$orderid)->where('title','Total')->get()[0]->value;

        return view('dashboardarea.view-order-details',$data);

     }

}
