
<?php $__env->startSection('title', 'Salesanta | User Add addresses'); ?>
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
					<form class="form" action="<?php echo e(route('add-addresses-save')); ?>" method="post" name="saveuseraddress" id="saveuseraddress">
                        <?php echo csrf_field(); ?>

                        <div class="row mb-2">
                            <div class="col-6 ">
								<label for="name">
									<h4>Name</h4>
								</label>
								<input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="col-6">
								<label for="mobileno">
									<h4>10 digit mobile number</h4>
								</label>
								<input type="text" class="form-control" name="mobileno" id="mobileno">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-6">
								<label for="pincode">
									<h4>Pincode</h4>
								</label>
								<input type="text" class="form-control" name="pincode" id="pincode">

                            </div>
                            <div class="col-6">
								<label for="locality">
									<h4>Locality</h4>
								</label>
								<input type="text" class="form-control" name="locality" id="locality">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-12">
								<label for="address_area_and_street">
									<h4>Address (Area and Street)</h4>
								</label>
								<textarea class="form-control" name="address_area_and_street"></textarea>
                            </div>
                        </div>


                        <div class="row mb-2">
                            <div class="col-6">
								<label for="city_or_district_or_town">
									<h4>City/District/Town</h4>
								</label>
								<input type="text" class="form-control" name="city_or_district_or_town" id="city_or_district_or_town">
                            </div>
                            <div class="col-6">
								<label for="state">
									<h4>State</h4>
								</label>
                                <select name="state" class="form-control">
                                    <option value="">--Select State--</option>
                                    <option value="AN">Andaman and Nicobar Islands</option>
                                    <option value="AP">Andhra Pradesh</option>
                                    <option value="AR">Arunachal Pradesh</option>
                                    <option value="AS">Assam</option>
                                    <option value="BR">Bihar</option>
                                    <option value="CH">Chandigarh</option>
                                    <option value="CT">Chhattisgarh</option>
                                    <option value="DN">Dadra and Nagar Haveli</option>
                                    <option value="DD">Daman and Diu</option>
                                    <option value="DL">Delhi</option>
                                    <option value="GA">Goa</option>
                                    <option value="GJ">Gujarat</option>
                                    <option value="HR">Haryana</option>
                                    <option value="HP">Himachal Pradesh</option>
                                    <option value="JK">Jammu and Kashmir</option>
                                    <option value="JH">Jharkhand</option>
                                    <option value="KA">Karnataka</option>
                                    <option value="KL">Kerala</option>
                                    <option value="LA">Ladakh</option>
                                    <option value="LD">Lakshadweep</option>
                                    <option value="MP">Madhya Pradesh</option>
                                    <option value="MH">Maharashtra</option>
                                    <option value="MN">Manipur</option>
                                    <option value="ML">Meghalaya</option>
                                    <option value="MZ">Mizoram</option>
                                    <option value="NL">Nagaland</option>
                                    <option value="OR">Odisha</option>
                                    <option value="PY">Puducherry</option>
                                    <option value="PB">Punjab</option>
                                    <option value="RJ">Rajasthan</option>
                                    <option value="SK">Sikkim</option>
                                    <option value="TN">Tamil Nadu</option>
                                    <option value="TG">Telangana</option>
                                    <option value="TR">Tripura</option>
                                    <option value="UP">Uttar Pradesh</option>
                                    <option value="UT">Uttarakhand</option>
                                    <option value="WB">West Bengal</option>
                                </select>
                            </div>
                        </div>


                        <div class="row mb-2">
                            <div class="col-6">
								<label for="landmark">
									<h4>Landmark (Optional)</h4>
								</label>
								<input type="text" class="form-control" name="landmark" id="landmark">
                            </div>
                            <div class="col-6">
								<label for="alternate_phone">
									<h4>Alternate Phone (Optional)</h4>
								</label>
								<input type="text" class="form-control" name="alternate_phone" id="alternate_phone">
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-6">
								<label for="address_type">
									<h4>Address Type</h4>
								</label>
                                <select name="address_type" class="form-control">
                                    <option value="">--Select Address Type--</option>
                                    <option value="0">Home</option>
                                    <option value="1">Work</option>
                                </select>
                            </div>
                        </div>


						<div class="form-group">
						 <button class="btn btn-lg btn-success pull-left" type="submit">Save</button>
					   </div>

					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- contact us section ending here -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/dashboardarea/add-my-addresses.blade.php ENDPATH**/ ?>