@extends('layouts.app')
  @section('title', 'MY ORDERS DETAILS')
   @section('content')

	<!-- page header section ending here -->
	<section class="breadcrumb-area breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="breadcrumb-content">
						<h2 class="title">MY ORDERS DETAILS</h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">MY ORDERS DETAILS/li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- page header section ending here -->
	<!-- contact us section start here -->
	<div class="container">
		<div class="row profile">
			<div class="col-md-3">
				<div class="profile-sidebar">
					<!-- SIDEBAR MENU -->
                        @include('dashboardarea.sideber')
					<!-- END MENU -->
				</div>
			</div>
			<div class="col-md-9">
				<div class="profile-content">

                    <div class="table-responsive">
                        <table class="table table-hover table-success">

                            <tr>
                                <td>Delivery Address</td>
                                <td><?php echo $orderdetails->user_addresses_title; ?>, <?php echo $orderdetails->user_full_shipping_and_billing_details_info; ?></td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td><?php echo $orderdetails->user_phone; ?></td>
                            </tr>
                            <tr>
                                <td>Order Status</td>
                                <td><?php if($orderdetails->order_status == 2){ echo "Order Received"; }elseif($orderdetails->order_status == 3){ echo "In Progress"; }elseif($orderdetails->order_status == 4){ echo "Delivered"; } ?></td>
                            </tr>

                            <tr>
                                <td>Purchase  Date</td>
                                <td><?php echo date("Y-m-d",strtotime($orderdetails->purchased_date)); ?></td>
                            </tr>

                            <tr>
                                <td>Estimated date of delivery</td>
                                <td><?php echo $orderdetails->edd; ?></td>
                            </tr>

                            <tr>
                                <td>Payment Mode</td>
                                <td><?php echo $orderpaymentmethod->payment_method; ?></td>
                            </tr>
                        </table>

                        <table class="table table-primary">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php

                            foreach($orderproducts as $row){
                            ?>
                                <tr>
                                    <td style="width:40%">
                                        <div class="media">
                                            <a href="javascript:void(0)" data-rel="lightcase">
                                                <img src="{{ Getimageurllarge($row->product_id) }}" width="100" height="auto">
                                            </a>
                                            <div class="media-body m-2">
                                                <h6><?php echo GetProductName($row->product_id); ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width:15%">
                                        <input type="text" class="form-control" id="qty" value="<?php echo $row->product_quantity; ?>" readonly="">
                                    </td>
                                    <td><strong>&#8377;<?php echo number_format($row->product_price,2); ?></strong></td>
                                    <td><strong>&#8377;<?php echo number_format($row->product_price * $row->product_quantity,2); ?></strong></td>
                                </tr>

                                <?php } ?>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td width="50%"><h6>Sub Total</h6></td>
                                    <td class="text-left"><h6><strong>&#8377;<?php echo number_format($ordersubtotals,2); ?></strong></h6></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>

                                    <td><h6>Delivery cost</h6></td>
                                    <td class="text-left"><h6>
                                    <strong>&#8377;<?php echo number_format($orderdcost,2); ?></strong></h6></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>

                                    <td><h4>Total</h4></td>
                                    <td class="text-left"><h4><strong>&#8377;<?php echo number_format($ordertotals,2); ?></strong></h4></td>
                                </tr>

                            </tbody>
                        </table>





                                </div>




			</div>
		</div>
	</div>
	<!-- contact us section ending here -->



    @endsection
