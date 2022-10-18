

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
                                <h5 class="sub-title">Sign Up to view your profile</h5>
                            </div>

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

                            <div class="contact-wrap-content">
                                <form action="<?php echo e(route('user.save-user')); ?>" name="userregistration" class="contact-form" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-grp">
                                        <label for="name">Your Name <span>*</span></label>
                                        <input type="text" name="name" id="name" placeholder="Your Name">
                                    </div>
                                    <div class="form-grp">
                                        <label for="email">Your Email <span>*</span></label>
                                        <input type="email" name="email" id="email" placeholder="Your Email">
                                    </div>
                                    <div class="form-grp">
                                        <label for="phone">Your Phone No. <span>*</span></label>
                                        <input type="text" name="phone" id="phone" placeholder="Your Phone No.">
                                    </div>
                                    <div class="form-grp">
                                        <label for="password">Password <span>*</span></label>
                                        <input type="password" name="password" id="password" placeholder="password">
                                    </div>
                                    <div class="form-grp">
                                        <label for="confirmpassword">Confirm Password <span>*</span></label>
                                        <input type="confirmpassword" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <button type="submit" name="register" class="btn rounded-btn">Register</button>
                                        </div>
                                        <div class="col-md-7">
                                            <p> <input type="checkbox" checked> I accept all <a href="#"> Terms & Conditions </a> </p>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <p>Already Have An Account? <a href="<?php echo e(route('login')); ?>">Login</a> </p>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/registration.blade.php ENDPATH**/ ?>