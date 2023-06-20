<?php $__env->startSection('title', 'Salesanta | Checkout'); ?>
<style>
._1AtVbE {
    display: block;
}

._2KgtFC, ._2KgtFC ._2jAffS {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-justify-content: center;
    justify-content: center;
}
._2KgtFC ._2jAffS {
    -webkit-flex: 3;
    -ms-flex: 3;
    flex: 3;
    -ms-flex-pack: center;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    font-size: 14px;
}

._2KgtFC ._2jAffS ._39UmMw {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex-direction: row;
    -ms-flex-direction: row;
    flex-direction: row;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
}

._2KgtFC ._2jAffS ._3cbqEw {
    color: #111112;
    line-height: 20px;
    margin-right: 5px;
}

._2KgtFC ._2jAffS ._39UmMw .lNRzo7 {
    max-width: 250px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

._2KgtFC ._2jAffS ._1ztrhx {
    color: #111112;
    line-height: 20px;
    font-weight: 500;
}

._2KgtFC ._2jAffS ._1ztrhx {
    color: #111112;
    line-height: 20px;
    font-weight: 500;
}

._2KgtFC ._2jAffS ._1z9mdb {
    background-color: #f0f2f5;
    margin: 0 0 0 12px;
    color: #717478;
    font-size: 10px;
    text-align: center;
    padding: 4px 8px;
    border-radius: 2px;
}

._2KgtFC ._2jAffS ._24tYAm {
    color: #717478;
    line-height: 20px;
    width: 386px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin: 4px 0;
}
._2KgtFC ._2x4YJB {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex: 1;
    -ms-flex: 1;
    flex: 1;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-align-items: flex-end;
    -ms-flex-align: end;
    align-items: flex-end;
}

._2KgtFC ._2x4YJB ._38NiRp {
    -webkit-justify-content: flex-end;
    -ms-flex-pack: end;
    justify-content: flex-end;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
}
._2KgtFC ._2x4YJB ._38NiRp ._2MMH-I {
    border: 1px solid #e0e0e0;
    background-color: #fff;
    border-radius: 4px;
    padding: 10px 16px;
    color: #2874f0;
    cursor: pointer;
    font-weight: 500;
}

</style>
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
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/cart')); ?>">Cart</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- checkout-area -->
    <div class="checkout-area pt-90 pb-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="checkout-progress-wrap">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="checkout-progress-step">
                            <ul>
                                <li class="active">
                                    <div class="icon"><i class="fas fa-check"></i></div>
                                    <span>Shipping</span>
                                </li>
                                <li>
                                    <div class="icon">2</div>
                                    <span>Order Successful</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="checkout-form-wrap">
                        


                        <div class="_1AtVbE col-12-12">
                            <div class="_2KgtFC">
                                <div class="_2jAffS">
                                    <div class="_39UmMw">
                                        <div class="_3cbqEw">Deliver to:</div>
                                        <div class="lNRzo7"><span class="_1ztrhx">Biswajit Maity</span></div>
                                        <span class="_1ztrhx">, 721448</span><span class="_1z9mdb">HOME</span>
                                    </div>
                                    <div class="_24tYAm">
                                        SOSI DAS MARKET, PO - CHOREPALIA, PS - EGRA, WEST BENGAL, PURBA MEDINIPUR, CHOREPALIA, SOSI DAS MARKET,, CHOREPALIA BUS STAND Purba Medinipur District - 721448, West Bengal, SOSI DAS MARKET, Purba Medinipur District
                                    </div>
                                </div>
                                <div class="_2x4YJB">
                                    <div class="_38NiRp"><button class="_2MMH-I">Change</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $subtotal = 0;
                $weight = 0;
                ?>

                <?php if(count($cart) > 0): ?>
                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $subtotal = $subtotal + ($row->price * $row->qty);
                            $productinfo = json_decode($row->attributes);
                            $weight      = $weight + ($productinfo->weight * $row->qty);
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <div class="col-lg-5">
                    <div class="shop-cart-total order-summary-wrap">
                        <h3 class="title">Price Details</h3>
                        <div class="shop-cart-widget">
                            <form action="<?php echo e(route('order-store')); ?>" name="order-store" method="POST" id="order-store">
                                <?php echo csrf_field(); ?>

                                <?php
                                $get_courier_serviceability = GetCourierServiceability($weight);
                                ?>
                                <input type="hidden" name="courier_name" value="<?php echo e($get_courier_serviceability->data->available_courier_companies[0]->courier_name); ?>">
                                <input type="hidden" name="delivery_charges" value="<?php echo e($get_courier_serviceability->data->available_courier_companies[0]->cod_charges); ?>">

                                <ul>
                                    <li class="sub-total"><span>Price (<?php echo e(count($cart)); ?> item)</span>&#8377;<?php echo e($subtotal); ?></li>
                                     

                                    <li class="sub-total"><span>Delivery Charges </span>&#8377;<?php echo e($get_courier_serviceability->data->available_courier_companies[0]->cod_charges); ?> </li>
                                    <li class="cart-total-amount"><span>Total Price</span> <span class="amount">&#8377;<?php echo e($subtotal + $get_courier_serviceability->data->available_courier_companies[0]->cod_charges); ?></span></li>
                                </ul>


                                <div class="payment-method-info">
                                    <div class="paypal-method-flex">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="paymentmethod" value="cod" id="customCheck12">
                                            <label class="custom-control-label" for="customCheck12">Cash on delivery</label>
                                        </div>
                                    </div>
                                    <div class="paypal-method-flex">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="paymentmethod" value="razorpay" id="customCheck13">
                                            <label class="custom-control-label" for="customCheck13">Pay with Razorpay</label>
                                        </div>
                                        <div class="paypal-logo"><img src="<?php echo e(asset('frontend/img/images/card.png')); ?>" alt=""></div>
                                    </div>
                                </div>

                                
                                <button class="btn">Place order</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area-end -->
</main>
<!-- main-area-end -->

<?php $__env->startPush('frontend-scripts'); ?>
<script>
    $(document).ready(function(){
        //for change event
          $('input[name="shippingcharge"]').on('change', function() {
            //To allow users select only one checkbox
              $('input[name="shippingcharge"]').not(this).prop('checked', false);
            //Get selected checkbox value
               alert($('input[name="shippingcharge"]:checked').val());
          });
    });
    </script>



<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/cart/checkout.blade.php ENDPATH**/ ?>