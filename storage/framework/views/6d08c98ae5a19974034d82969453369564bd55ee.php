

<?php $__env->startSection('content'); ?>

        <!-- main-area -->
        <main>

            <!-- breadcrumb-area -->
            <div class="breadcrumb-area breadcrumb-bg-two">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                        
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area-end -->

            <!-- cart-area -->
            <div class="cart-area pt-90 pb-90">
                <div class="container">
                    <div class="row justify-content-center">

                            <div class="col-xl-7">
                                <form action="<?php echo e(route('update-cart')); ?>" name="updatecartitems" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="cart-wrapper">
                                        <div class="table-responsive">
                                            <?php
                                                $subtotal = 0;
                                            ?>

                                            <?php if(count($cart) > 0): ?>
                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-thumbnail">Image</th>
                                                            <th class="product-name">Product</th>
                                                            <th class="product-price">Price</th>
                                                            <th class="product-quantity">QUANTITY</th>
                                                            <th class="product-subtotal">SUBTOTAL</th>
                                                            <th class="product-delete"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                $subtotal = $subtotal + ($row->price * $row->qty);
                                                            ?>
                                                                <tr>
                                                                    <td class="product-thumbnail"><a href="shop-details.html"><img src="<?php echo e($row->image); ?>" alt=""></a></td>
                                                                    <td class="product-name">
                                                                        <h4><a href="shop-details.html"><?php echo e($row->name); ?></a></h4>
                                                                    </td>
                                                                    <td class="product-price">&#8377; <?php echo e($row->price); ?></td>
                                                                    <td class="product-quantity">
                                                                        <div class="cart--plus--minus">
                                                                            
                                                                            <input type="hidden" name="rowid[]" value="<?php echo e($row->id); ?>">
                                                                            <input type="number" id="quantity" name="quantity[]" min="1" max="99" value="<?php echo e($row->qty); ?>">
                                                                        </div>
                                                                    </td>
                                                                    <td class="product-subtotal"><span>&#8377; <?php echo e($row->price * $row->qty); ?></span></td>
                                                                    <td class="product-delete"><a href="<?php echo e(route('remove-cart-item',['rowid='.Crypt::encryptString($row->id)])); ?>"><i class="far fa-trash-alt"></i></a></td>
                                                                </tr>

                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    </tbody>
                                                </table>
                                            <?php else: ?>
                                                <p class="text-center">Your Salesanta Cart is empty.</p>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                    <div class="shop-cart-bottom">
                                        <div class="cart-coupon">
                                            
                                        </div>

                                        <?php if(count($cart) > 0): ?>
                                        <div class="continue-shopping">
                                            
                                            <button type="submit" name="submit" class="btn">update Cart</button>
                                        </div>
                                        <?php endif; ?>

                                    </div>
                                </form>
                            </div>

                            <?php if(count($cart) > 0): ?>
                            <div class="col-xl-5 col-lg-12">
                                <div class="shop-cart-total">
                                    <h3 class="title">Cart Totals</h3>
                                    <div class="shop-cart-widget">
                                        <form action="#">
                                            <ul>
                                                <li class="sub-total"><span>Subtotal</span> &#8377; <?php echo e($subtotal); ?></li>
                                                
                                                <li class="cart-total-amount"><span>Total Price</span> <span class="amount">&#8377; <?php echo e($subtotal); ?></span></li>
                                            </ul>
                                            <a href="<?php echo e(route('razorpay-payment',['payableamount='.$subtotal])); ?>" class="btn">PROCEED TO CHECKOUT</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>



                    </div>
                </div>
            </div>
            <!-- cart-area-end -->

        </main>
        <!-- main-area-end -->

        <?php $__env->startPush('frontend-scripts'); ?>
        <script type="text/javascript">
            function Cartitemplus(){
                alert("here"); return false;
            }
        </script>
        <?php $__env->stopPush(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/cart/cart.blade.php ENDPATH**/ ?>