<?php

namespace App\Http\Controllers\Vendor\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendororderController extends Controller
{

     /**
     * Show the vendor order details view page.
     *
     * @return \Illuminate\Http\Response
     */
	public function order_list(Request $request){
		return view("vendor.order.order-list");
	}
}
