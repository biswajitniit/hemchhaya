  <?php $__env->startSection('title', 'MY ORDERS'); ?>
   <?php $__env->startSection('content'); ?>

	<!-- page header section ending here -->
	<section class="breadcrumb-area breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="breadcrumb-content">
						<h2 class="title">MY ORDERS</h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">MY ORDERS</li>
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
                        <?php echo $__env->make('dashboardarea.sideber', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<!-- END MENU -->
				</div>
			</div>
			<div class="col-md-9">
				<div class="profile-content">
                    <div class="table-responsive">
                        <?php if(!$orderdetails->isEmpty()) { // $data is not empty ?>
                            <table class="table table-hover table-primary">
                                <thead>
                                  <tr>
                                    <th>Order Number</th>
                                    <th>Order Date</th>
                                    <th>Delivery ETD</th>
                                    <th>Order Cost</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach($orderdetails as $row){ ?>
                                  <tr>
                                    <td><?php echo $row->order_id; ?></td>
                                    <td><?php echo date("Y M d",strtotime($row->purchased_date)); ?></td>
                                    <td><?php echo $row->edd; ?></td>
                                    <td>&#8377; <?php echo str_replace(',', '', $row->value); ?></td>
                                    <td><a href="<?php echo e(url('view-order-details/'.$row->order_id )); ?>"><i class="fa fa-eye"></i> View</a></td>
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


				</div>
			</div>
		</div>
	</div>
	<!-- contact us section ending here -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/dashboardarea/my-orders-history.blade.php ENDPATH**/ ?>