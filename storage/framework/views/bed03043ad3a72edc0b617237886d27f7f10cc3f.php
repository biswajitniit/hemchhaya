<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script>
        $(window).on('load', function() {
          $('.razorpay-payment-button').click();
        });
      </script>
</head>
    <body>
    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-3 col-md-offset-6">

                        <?php if($message = Session::get('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Error!</strong> <?php echo e($message); ?>

                            </div>
                        <?php endif; ?>

                        <?php if($message = Session::get('success')): ?>
                            <div class="alert alert-success alert-dismissible fade <?php echo e(Session::has('success') ? 'show' : 'in'); ?>" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Success!</strong> <?php echo e($message); ?>

                            </div>
                        <?php endif; ?>

                        <div class="card card-default">
                            

                            <div class="card-body text-center">
                                <form action="<?php echo e(route('razorpay.payment.store')); ?>" method="POST" name="razorpayautosubmit" id="razorpayautosubmit">
                                    <input type="hidden" name="delivery_charges" value="<?php echo e(request()->delivery_charges); ?>">
                                    <?php echo csrf_field(); ?>
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="<?php echo e(env('RAZORPAY_KEY')); ?>"
                                            data-amount="<?php echo e(100 * Crypt::decryptString(request()->payableamount)); ?>"
                                            data-buttontext="Submit"
                                            data-name="Salesanta.com"
                                            data-description="Razorpay"
                                            data-image="<?php echo e(asset('frontend/img/logo/logo.png')); ?>"
                                            data-prefill.name="name"
                                            data-prefill.email="email"
                                            data-theme.color="#ff7529">
                                    </script>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
<?php /**PATH E:\webdev\hemchhaya\resources\views/razorpayView.blade.php ENDPATH**/ ?>