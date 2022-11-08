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
								<li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
					<form class="form" action="##" method="post" id="registrationForm">
						<div class="form-group">
							<div class="col-12">
								<label for="last_name">
									<h4>Address Titel</h4>
								</label>
								<input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
							</div>
						</div>
						<div class="form-group">
							<div class="col-12">
								<label for="last_name">
									<h4>Address 1</h4>
								</label>
								<input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
							</div>
						</div>
						<div class="form-group">
							<div class="col-12">
								<label for="last_name">
									<h4>Address 2</h4>
								</label>
								<input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
							</div>
						</div>
						<div class="form-group">
							<div class="col-12">
								<label for="phone">
									<h4>Area</h4>
								</label>
								<input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
							</div>
						</div>
						<div class="form-group">
							<div class="col-12">
								<label for="first_name">
									<h4>Full name</h4>
								</label>
								<input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
							</div>
						</div>
						<div class="form-group">
							<div class="col-12">
								<label for="mobile">
									<h4>Telephone No</h4>
								</label>
								<input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
							</div>
						</div>
						<div class="form-group">
							<div class="col-12">
								<label for="mobile">
									<h4>Mobile</h4>
								</label>
								<input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
							</div>
						</div>
						<div class="form-group">
							<div class="col-12">
								<label for="email">
									<h4>Email</h4>
								</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
							</div>
						</div>
						<div class="form-group">
							<div class="col-12">
								   <button class="btn btn-lg btn-success" type="submit">Save</button>
									<button class="btn btn-lg" type="reset">Reset</button>
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