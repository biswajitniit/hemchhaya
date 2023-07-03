<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
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
use Illuminate\Support\Facades\Auth;


class RazorpayPaymentController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('razorpayView');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
               // echo "<pre>"; print_r($response->toArray()); die;
              $getresponce = $response->toArray();
              //echo $getresponce['status']; die;
              if($getresponce['status'] == "captured"){

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
                                        "payment_method" => "Prepaid",
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

                    Mail::send('email.order_success_template', ["id"=>$orderid,"order_id"=>$orderid,"payment_method"=>"Prepaid","user_full_shipping_details_info"=>"Test","user_phone"=>"8768624650"], function($message) use ($toemail){
                        $message->to($toemail);
                        //$message->bcc('test@salesanta.com');
                        $message->subject('Your Order Received Successfully');
                    });


                    return redirect('/order-success');
              }




            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }

        Session::put('success', 'Payment successful');
        return redirect()->back();
    }
}
