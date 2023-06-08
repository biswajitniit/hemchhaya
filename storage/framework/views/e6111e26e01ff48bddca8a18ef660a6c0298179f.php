
<?php $__env->startSection('title', 'Salesanta | User Edit addresses'); ?>
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
								<li class="breadcrumb-item"><a href="index.html">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit Addresses</li>
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

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if(session()->has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('message')); ?>

                    </div>
                <?php endif; ?>


				<div class="profile-content">
					<form class="form" action="<?php echo e(route('edit-user-addresses-post',[$useraddress->id])); ?>" method="post" name="edituseraddressespost" id="edituseraddressespost">
                        <?php echo csrf_field(); ?>

                        <div class="row mb-2">
                            <div class="col-6 ">
								<label for="name">
									<h4>Name</h4>
								</label>
								<input type="text" class="form-control" name="name" id="name" value="<?php echo e($useraddress->name); ?>">
                            </div>
                            <div class="col-6">
								<label for="mobileno">
									<h4>10 digit mobile number</h4>
								</label>
								<input type="text" class="form-control" name="mobileno" id="mobileno"  value="<?php echo e($useraddress->mobileno); ?>">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-6">
								<label for="pincode">
									<h4>Pincode</h4>
								</label>
								<input type="text" class="form-control" name="pincode" id="pincode" value="<?php echo e($useraddress->pincode); ?>">

                            </div>
                            <div class="col-6">
								<label for="locality">
									<h4>Locality</h4>
								</label>
								<input type="text" class="form-control" name="locality" id="locality" value="<?php echo e($useraddress->locality); ?>">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-12">
								<label for="address_area_and_street">
									<h4>Address (Area and Street)</h4>
								</label>
								<textarea class="form-control" name="address_area_and_street"><?php echo e($useraddress->address_area_and_street); ?></textarea>
                            </div>
                        </div>


                        <div class="row mb-2">
                            <div class="col-6">
								<label for="city_or_district_or_town">
									<h4>City/District/Town</h4>
								</label>
								<input type="text" class="form-control" name="city_or_district_or_town" id="city_or_district_or_town" value="<?php echo e($useraddress->city_or_district_or_town); ?>">
                            </div>
                            <div class="col-6">
								<label for="state">
									<h4>State</h4>
								</label>
                                <select name="state" class="form-control">
                                    <option value="">--Select State--</option>
                                    <option value="AN" <?php if($useraddress->state == "AN"): ?> selected="selected" <?php endif; ?>>Andaman and Nicobar Islands</option>
                                    <option value="AP" <?php if($useraddress->state == "AP"): ?> selected="selected" <?php endif; ?>>Andhra Pradesh</option>
                                    <option value="AR" <?php if($useraddress->state == "AR"): ?> selected="selected" <?php endif; ?>>Arunachal Pradesh</option>
                                    <option value="AS" <?php if($useraddress->state == "AS"): ?> selected="selected" <?php endif; ?>>Assam</option>
                                    <option value="BR" <?php if($useraddress->state == "BR"): ?> selected="selected" <?php endif; ?>>Bihar</option>
                                    <option value="CH" <?php if($useraddress->state == "CH"): ?> selected="selected" <?php endif; ?>>Chandigarh</option>
                                    <option value="CT" <?php if($useraddress->state == "CT"): ?> selected="selected" <?php endif; ?>>Chhattisgarh</option>
                                    <option value="DN" <?php if($useraddress->state == "DN"): ?> selected="selected" <?php endif; ?>>Dadra and Nagar Haveli</option>
                                    <option value="DD" <?php if($useraddress->state == "DD"): ?> selected="selected" <?php endif; ?>>Daman and Diu</option>
                                    <option value="DL" <?php if($useraddress->state == "DL"): ?> selected="selected" <?php endif; ?>>Delhi</option>
                                    <option value="GA" <?php if($useraddress->state == "GA"): ?> selected="selected" <?php endif; ?>>Goa</option>
                                    <option value="GJ" <?php if($useraddress->state == "GJ"): ?> selected="selected" <?php endif; ?>>Gujarat</option>
                                    <option value="HR" <?php if($useraddress->state == "HR"): ?> selected="selected" <?php endif; ?>>Haryana</option>
                                    <option value="HP" <?php if($useraddress->state == "HP"): ?> selected="selected" <?php endif; ?>>Himachal Pradesh</option>
                                    <option value="JK" <?php if($useraddress->state == "JK"): ?> selected="selected" <?php endif; ?>>Jammu and Kashmir</option>
                                    <option value="JH" <?php if($useraddress->state == "JH"): ?> selected="selected" <?php endif; ?>>Jharkhand</option>
                                    <option value="KA" <?php if($useraddress->state == "KA"): ?> selected="selected" <?php endif; ?>>Karnataka</option>
                                    <option value="KL" <?php if($useraddress->state == "KL"): ?> selected="selected" <?php endif; ?>>Kerala</option>
                                    <option value="LA" <?php if($useraddress->state == "LA"): ?> selected="selected" <?php endif; ?>>Ladakh</option>
                                    <option value="LD" <?php if($useraddress->state == "LD"): ?> selected="selected" <?php endif; ?>>Lakshadweep</option>
                                    <option value="MP" <?php if($useraddress->state == "MP"): ?> selected="selected" <?php endif; ?>>Madhya Pradesh</option>
                                    <option value="MH" <?php if($useraddress->state == "MH"): ?> selected="selected" <?php endif; ?>>Maharashtra</option>
                                    <option value="MN" <?php if($useraddress->state == "MN"): ?> selected="selected" <?php endif; ?>>Manipur</option>
                                    <option value="ML" <?php if($useraddress->state == "ML"): ?> selected="selected" <?php endif; ?>>Meghalaya</option>
                                    <option value="MZ" <?php if($useraddress->state == "MZ"): ?> selected="selected" <?php endif; ?>>Mizoram</option>
                                    <option value="NL" <?php if($useraddress->state == "NL"): ?> selected="selected" <?php endif; ?>>Nagaland</option>
                                    <option value="OR" <?php if($useraddress->state == "OR"): ?> selected="selected" <?php endif; ?>>Odisha</option>
                                    <option value="PY" <?php if($useraddress->state == "PY"): ?> selected="selected" <?php endif; ?>>Puducherry</option>
                                    <option value="PB" <?php if($useraddress->state == "PB"): ?> selected="selected" <?php endif; ?>>Punjab</option>
                                    <option value="RJ" <?php if($useraddress->state == "RJ"): ?> selected="selected" <?php endif; ?>>Rajasthan</option>
                                    <option value="SK" <?php if($useraddress->state == "SK"): ?> selected="selected" <?php endif; ?>>Sikkim</option>
                                    <option value="TN" <?php if($useraddress->state == "TN"): ?> selected="selected" <?php endif; ?>>Tamil Nadu</option>
                                    <option value="TG" <?php if($useraddress->state == "TG"): ?> selected="selected" <?php endif; ?>>Telangana</option>
                                    <option value="TR" <?php if($useraddress->state == "TR"): ?> selected="selected" <?php endif; ?>>Tripura</option>
                                    <option value="UP" <?php if($useraddress->state == "UP"): ?> selected="selected" <?php endif; ?>>Uttar Pradesh</option>
                                    <option value="UT" <?php if($useraddress->state == "UT"): ?> selected="selected" <?php endif; ?>>Uttarakhand</option>
                                    <option value="WB" <?php if($useraddress->state == "WB"): ?> selected="selected" <?php endif; ?>>West Bengal</option>
                                </select>
                            </div>
                        </div>


                        <div class="row mb-2">
                            <div class="col-6">
								<label for="landmark">
									<h4>Landmark (Optional)</h4>
								</label>
								<input type="text" class="form-control" name="landmark" id="landmark" value="<?php echo e($useraddress->landmark); ?>">
                            </div>
                            <div class="col-6">
								<label for="alternate_phone">
									<h4>Alternate Phone (Optional)</h4>
								</label>
								<input type="text" class="form-control" name="alternate_phone" id="alternate_phone" value="<?php echo e($useraddress->alternate_phone); ?>">
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-6">
								<label for="address_type">
									<h4>Address Type</h4>
								</label>
                                <select name="address_type" class="form-control">
                                    <option value="">--Select Address Type--</option>
                                    <option value="0" <?php if($useraddress->address_type == 0): ?> selected="selected" <?php endif; ?> >Home</option>
                                    <option value="1" <?php if($useraddress->address_type == 1): ?> selected="selected" <?php endif; ?> >Work</option>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/dashboardarea/edit-my-addresses.blade.php ENDPATH**/ ?>