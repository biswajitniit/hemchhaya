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
                            <form action="<?php echo e(route('forget.password.post')); ?>" method="post" class="contact-form" id="contact-form">
                                <?php echo csrf_field(); ?>
                                <div class="form-grp">
                                    <label for="email">Send an email to <span>*</span></label>
                                    <input type="email" id="email_address" name="email" class="validate[required] form-control" placeholder="Email" value="<?php echo e(old('email')); ?>" />

                                    <?php if($errors->has('email')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <button type="submit" class="btn rounded-btn" >Send Password Reset Link</button>
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
        $("#contact-form").validationEngine();
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/auth/forgetPassword.blade.php ENDPATH**/ ?>