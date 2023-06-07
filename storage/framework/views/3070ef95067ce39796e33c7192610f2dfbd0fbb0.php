<?php $__env->startSection('content'); ?>

<!-- main-area -->
<main>
    <!-- contact-area -->
    <section class="contact-area pt-90 pb-90 login_">
        <div class="container">
            <div class="container-inner-wrap">
                <div class="row justify-content-center justify-content-lg-between">
                    <div class="col-md-6 offset-md-3 style_b">
                        <div class="contact-title mb-25">
                            <h5 class="sub-title">Reset Password</h5>
                        </div>
                        <div class="contact-wrap-content">
                            <?php if(Session::has('message')): ?>
                            <div class="alert alert-success" role="alert">
                               <?php echo e(Session::get('message')); ?>

                            </div>
                            <?php endif; ?>
                            <form action="<?php echo e(route('reset.password.post')); ?>" method="post" class="resetpassword-form" id="resetpassword-form">
                                <?php echo csrf_field(); ?>
                                <div class="form-grp mb-2">
                                    <label for="email">E-Mail Address <span>*</span></label>
                                    <input type="email" id="email_address" class="validate[required] form-control" name="email" placeholder="Email">
                                    <?php if($errors->has('email')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-grp mb-2">
                                    <label for="email">Password <span>*</span></label>
                                    <input type="password" id="password" class="form-control" name="password" placeholder="Password" onChange="Chkpassword_and_conpassword()">
                                    <?php if($errors->has('password')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-grp mb-2">
                                    <label for="email">Confirm Password <span>*</span></label>
                                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Retype password" onChange="Chkpassword_and_conpassword()">
                                    <?php if($errors->has('password_confirmation')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('password_confirmation')); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <button type="submit" class="btn rounded-btn" >Reset Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->
</main>
<!-- main-area-end -->

<?php $__env->startPush('frontend-scripts'); ?>
<script>
    $(document).ready(function () {
        $("#resetpassword-form").validationEngine();
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/auth/forgetPasswordLink.blade.php ENDPATH**/ ?>