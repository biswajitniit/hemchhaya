

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
                                <h5 class="sub-title">Sign in to start your session</h5>
                            </div>
                            <div class="contact-wrap-content">
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


                                <form action="<?php echo e(route('user.loginpost')); ?>" name="userlogin" class="contact-form" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-grp">
                                        <label for="email">Your Email <span>*</span></label>
                                        <input type="email" name="email" id="email" placeholder="Your Email">
                                    </div>
                                    <div class="form-grp">
                                        <label for="password">Your Password <span>*</span></label>
                                        <input type="password" name="password" id="password" placeholder="Password">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <button type="submit" class="btn rounded-btn">Sign in</button>
                                        </div>
                                        <div class="col-md-7">
                                            <p>Need help? <a href="#">Forgot Password</a> </p>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <p>Didn't Have An Account? <a href="<?php echo e(route('user.registration')); ?>">Register</a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/auth/login.blade.php ENDPATH**/ ?>