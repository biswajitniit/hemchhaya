<?php $__env->startSection('title', 'Salesanta | User Dashboard'); ?>
<?php $__env->startSection('content'); ?>

	<!-- page header section ending here -->
	<section class="breadcrumb-area breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="breadcrumb-content">
						<h2 class="title">MY PROFILE</h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">My PROFILE</li>
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

					<?php if(Session::has('message')) { ?>
						<div class="alert alert-success"> <?php echo Session::get('message'); ?> </div>
					<?php } ?>

					<?php if ($errors->any()){ ?>
						<div class="alert alert-danger">
							<ul>
								<?php foreach ($errors->all() as $error){ ?>
									<li><?php echo  $error ; ?></li>
								<?php } ?>
							</ul>
						</div>
					<?php } ?>

                    <form class="form" action="<?php echo e(route('user-update-profile')); ?>" method="post" id="registrationForm">
                        <?php echo csrf_field(); ?>
						<div class="form-group">
							<div class="col-12">
								<label for="last_name">
									<h4>Name</h4>
								</label>
								<input type="text" class="form-control" name="name" id="name" placeholder="Name" title="enter your name." value="<?php echo e(Auth::user()->name); ?>">
							</div>
						</div>
						<div class="form-group">
							<div class="col-12">
								<label for="last_name">
									<h4>Email</h4>
								</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Email" title="enter your email." value="<?php echo e(Auth::user()->email); ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<div class="col-12">
								<label for="last_name">
									<h4>Phone</h4>
								</label>
								<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" title="enter your phone." value="<?php echo e(Auth::user()->phone); ?>">
							</div>
						</div>
						<div class="form-group">
							<div class="col-12">
								   <button class="btn btn-lg btn-success" type="submit">Save</button>
									
							 </div>
					   </div>
					</form>

				</div>
			</div>
		</div>
	</div>
	<!-- contact us section ending here -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/dashboardarea/user-dashboard.blade.php ENDPATH**/ ?>