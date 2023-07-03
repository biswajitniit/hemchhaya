<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Order Received</title>
</head>

<body>
	<table align="center" border="0" cellpadding="0" cellspacing="0" style="background:#FFF;color:#232f3e;font-family:helvetica,arial,sans-serif;font-size:15px;line-height:24px;margin:20px auto 0;width: 600px;">
		<tbody>
			<tr>
				<td>
					<table border="0" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td>
									<table border="0" cellpadding="0" cellspacing="0" style="width:100%; text-align: center;">
										<tbody>
											<tr>
												<td>
													<img src="<?php echo e(asset('/frontend/img/logo/logo.png')); ?>" alt="" style="height: 120px;">
												</td>
											</tr>
											<tr>
												<td>
													<h2 style="color: #FFF;background: #f4182a;text-align: center;padding: 24px;border-radius: 4px;">Your order has been received successfully!  </h2>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
                            <tr style="border: 1px solid #ddd;display: block; padding: 2% 2% 1%;width: 96%;border-radius: 6px;margin-bottom: 20px;">
								<td>
									<img src="<?php echo e(asset('/frontend/img/emailtemplateimage/order-received.png')); ?>" alt="" style=" width: 100%;">
								</td>
							</tr>
							<tr style="display: block;">
								<td style="width: 50%;     float: left;">
                                    <table align="left" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td><strong>Order ID :</strong><br>
                                                    <?php echo $order_id; ?></td>

                                            </tr>
                                            <tr>
                                                <td style="margin: 10px 0 0;display: block;"><strong>Payment method :</strong><br>
                                                    <?php echo $payment_method; ?></td>

                                            </tr>
                                            <tr>
                                                <td><strong><a href="<?php echo url('/view-order-details/'.$order_id); ?>" target="_blank" style="text-transform: uppercase; text-decoration: none;  background: #FFC107;  padding: 10px 15px;
                                                    margin: 10px 0; display: block; color: #fff;  border-radius: 3px;">Track Your Order</a></strong></td>

                                            </tr>
                                        </tbody>
                                </table>
                                </td>
                                <td>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td><strong>Shipping To :</strong><br>
                                                    <?php echo $user_full_shipping_details_info; ?></td>

                                            </tr>
                                            <tr>
                                                <td style="margin: 10px 0 0;display: block;"><strong>Phone No :</strong><br>
                                                    <?php echo $user_phone; ?></td>

                                            </tr>

                                        </tbody>
                                </table>
								</td>
							</tr>


							<tr>
								<td>
									<h4 style="margin-bottom:10px;margin-top: 10px;">
									  <a href="<?php echo url('view-order-details/'.$order_id); ?>" target="_blank">Click here</a> to view the invoice for these items.
									</h4>
									<h4 style="margin-top: 0px;margin-bottom:20px;">
									  Happy shopping &amp; enjoy eating!<br>
									  Team DairyonDemand.
									</h4>
								</td>
							</tr>
							<tr style="width: 600px;background:url(<?php echo e(asset('/frontend/img/emailtemplateimage/banne_si.png')); ?>);display: inline-block;border-radius: 5px; height: 100px;">
								<td style="text-align: center;width: 150px;">
									<a href="#" target="_blank">
										<img src="<?php echo e(asset('/frontend/img/emailtemplateimage/call_.png')); ?>" style="height:32px;position: relative;top: 20px;left: 10px;" alt="Call us">
									</a>
								</td>
								<td style="text-align: center;width: 150px;">
									<a href="#" target="_blank">
										<img src="<?php echo e(asset('/frontend/img/emailtemplateimage/fb.png')); ?>" style="height:32px;position: relative;top: 30px;" alt="facebook">
									</a>
								</td>
								<td style="text-align: center;width: 150px;">
									<a href="#" target="_blank">
										<img src="<?php echo e(asset('/frontend/img/emailtemplateimage/inst_.png')); ?>" style="height:32px;position: relative;top: 20px;left: -20px;" alt="Instagram">
									</a>
								</td>

								<td style="text-align: center;width: 100px;">
									<a href="#" target="_blank">
										<img src="<?php echo e(asset('/frontend/img/emailtemplateimage/tw_.png')); ?>" style="height:32px;position: relative;top:40px;left: -20px;" alt="twitter">
									</a>
								</td>
							</tr>
							<tr>
								<td>
									<h4 style="margin-top: 20px;color: #f4182a;text-align: center; background: #eee; padding: 10px;border-radius: 2px;">
									  For any further assistance or queries please <a href="<?php echo url('/contact-us'); ?>" target="_blank">Contact us</a>.
									</h4>
								</td>
							</tr>
						</tbody>
					</table>
					</td>
			</tr>
		</tbody>
	</table>
</body>

</html>
<?php /**PATH E:\webdev\hemchhaya\resources\views/email/order_success_template.blade.php ENDPATH**/ ?>