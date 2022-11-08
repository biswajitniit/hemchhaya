<?php $__env->startSection('title', 'Salesanta | My Address'); ?>
<?php $__env->startSection('content'); ?>

	<!-- page header section ending here -->
	<section class="breadcrumb-area breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="breadcrumb-content">
						<h2 class="title">Manage Addresses</h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Manage Addresses</li>
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
                    <?php echo $__env->make('dashboardarea.sideber', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				</div>
			</div>
			<div class="col-md-9">
				<div class="profile-content">
                    <section class="product">
                        <div class="table-responsive">
                            <div class="profile-userbuttons">
                                <a href="<?php echo e(url('/add-new-addresses')); ?>" class="btn btn-success btn-sm" style="float: right; margin-bottom: 8px;">Add New Address</a>
                            </div>

                            <table class="table table-hover table-bordered">
                                <thead class="thead-info">
                                    <tr>
                                        <th>Address Type</th>
                                        <th>Name</th>
                                        <th>Phone No</th>
                                        <th>Pincode</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if($useraddress): ?>
                                        <?php $__currentLoopData = $useraddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php if($row->address_type == 0): ?>
                                                        Home
                                                    <?php else: ?>
                                                        Work
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($row->name); ?></td>
                                                <td><?php echo e($row->mobileno); ?></td>
                                                <td><?php echo e($row->pincode); ?></td>
                                                <td><?php echo e($row->address_area_and_street); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('edit-my-addresses',[Crypt::encryptString($row->id)])); ?>" title="Edit addresses"><i class="fa fa-eye"></i> </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </section>

				</div>
			</div>
		</div>
	</div>
	<!-- contact us section ending here -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/dashboardarea/my-addresses.blade.php ENDPATH**/ ?>