<div class="profile-usermenu">
    <ul class="nav">
        <li <?php if(Request::segment(2) == 'dashboard'): ?>  class="active"  <?php endif; ?> >
            <a href="<?php echo e(url('/user/dashboard')); ?>"> <i class="fa fa-home"></i>
                MY PROFILE</a>
        </li>
        <li <?php if(Request::segment(1) == 'manage-addresses'): ?>  class="active"  <?php endif; ?>>
            <a href="<?php echo e(url('/manage-addresses')); ?>"> <i class="fa fa-user"></i>
                MY ADDRESS</a>
        </li>
        <li <?php if(Request::segment(1) == 'my-orders-history'): ?>  class="active"  <?php endif; ?>>
            <a href="<?php echo e(url('/my-orders-history')); ?>"> <i class="fa fa-flag"></i>
                MY ORDER HISTORY</a>
        </li>
        
        <li>
            <a href="<?php echo e(url('/manage-addresses')); ?>"> <i class="fa fa-lock"></i>
                RESET PASSWORD</a>
        </li>
        <li>
            <a href="<?php echo e(route('user.logout')); ?>"> <i class="fa fa-lock"></i>
                LOGOUT</a>
        </li>
    </ul>
</div>
<?php /**PATH E:\webdev\hemchhaya\resources\views/dashboardarea/sideber.blade.php ENDPATH**/ ?>