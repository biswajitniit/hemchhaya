  <?php $__env->startSection('title', 'Dairy On Demand| MY ORDERS'); ?>
   <?php $__env->startSection('content'); ?>


  	<!-- page header section ending here -->
	<section class="page-header padding-tb page-header-bg-1">
		<div class="container">
			<div class="page-header-item d-flex align-items-center justify-content-center">
				<div class="post-content">
					<h3>MY ORDERS</h3>
				</div>
			</div>
		</div>
	</section>
	<!-- page header section ending here -->

	<!-- contact us section start here -->
	<div class="container">
		<div class="row profile">
			<div class="col-md-3">
				<?php echo $__env->make("sideber", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>
			<div class="col-md-9">
				<div class="profile-content">
					<section class="product">
							<div class="table-responsive">



							<?php if(!$orderdetails->isEmpty()) { // $data is not empty ?>
								<table class="table table-hover table-primary">
									<thead>
									  <tr>
										<th>Order Number</th>
										<th>Order Date</th>
										<th>Delivery Date</th>
										<th>Delivery Time</th>
										<th>Order Cost</th>
										<th>Action</th>
									  </tr>
									</thead>
									<tbody>
									  <?php foreach($orderdetails as $row){ ?>
									  <tr>
										<td><?php echo $row->order_id; ?></td>
										<td><?php echo date("Y M d",strtotime($row->purchased_date)); ?></td>
										<td><?php echo date("Y M d",strtotime($row->delivery_date)); ?></td>
										<td><?php echo $row->delivery_time; ?></td>
										<td>AED <?php echo str_replace(',', '', $row->value); ?></td>
										<td><a href="<?php echo e(url('view-order-details/'.$row->id )); ?>"><i class="fa fa-eye"></i> View</a></td>
									  </tr>
									 <?php } ?>
									</tbody>
								  </table>

								<?php }else { // $data is empty ?>

									<table class="table table-bordered table-striped mb-none" id="datatable-editable">
										<tr>
											<th colspan=4 style="text-align:center;"> No Record Found </th>
										</tr>
									</table>

								<?php } ?>



							</div>

					</section>
				</div>
			</div>
		</div>
	</div>
	<!-- contact us section ending here -->





	<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/my-orders-history.blade.php ENDPATH**/ ?>