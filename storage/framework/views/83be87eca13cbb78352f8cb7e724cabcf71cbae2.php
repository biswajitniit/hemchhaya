 <?php $__env->startSection('title', 'Salesanta | Homepage'); ?> <?php $__env->startSection('content'); ?>

<!-- main-area -->
<main>
    <!-- slider-area -->
    <section class="slider-area" data-background="<?php echo e(asset('frontend/img/bg/slider_area_bg.jpg')); ?>">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="slider-active">
                        <?php if(!$banner->isEmpty()): ?> <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="single-slider slider-bg" data-background="<?php echo e($row->banner_image); ?>">
                            <div class="slider-content">
                                <h5 class="sub-title" data-animation="fadeInUp" data-delay=".2s"><?php echo e($row->banner_text_top); ?></h5>
                                <h2 class="title" data-animation="fadeInUp" data-delay=".4s"><?php echo e($row->banner_text_middle); ?></h2>
                                <p data-animation="fadeInUp" data-delay=".6s"><?php echo e($row->banner_text_buttom); ?></p>
                                <a href="<?php echo e($row->banner_url); ?>" class="btn rounded-btn" data-animation="fadeInUp" data-delay=".8s">Shop Now</a>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider-area-end -->

    <!-- special-products-area -->
    <section class="special-products-area gray-bg pt-20 pb-60">
        <div class="container">
            <div class="row align-items-end mb-50">
                <div class="col-md-8 col-sm-9">
                    <div class="section-title">
                        <span class="sub-title">Awesome Shop</span>
                        <h2 class="title">Our Special Products</h2>
                    </div>
                </div>
                <div class="col-md-4 col-sm-3">
                    <div class="section-btn text-left text-md-right">
                        <a href="<?php echo e(route('all-subcategory-item-list')); ?>" class="btn">View All</a>
                    </div>
                </div>
            </div>
            <div class="special-products-wrap">
                <div class="row">
                    
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <?php if($specialproduct): ?> <?php $countspecialproduct = 1; ?> <?php $__currentLoopData = $specialproduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="sp-product-item mb-20">
                                    <div class="sp-product-thumb">
                                        <span class="batch">New</span>
                                        <a
                                            href="<?php echo e(url('/view-product-details?pid='.Crypt::encryptString($rowproduct->id).'&cid='.Crypt::encryptString($rowproduct->category_id).'&scid='.Crypt::encryptString($rowproduct->sub_category_id).'&scitemid='.Crypt::encryptString($rowproduct->sub_category_item_id))); ?>"
                                        >
                                            <img src="<?php echo e($rowproduct->productimage->image_url); ?>" alt="" />
                                        </a>
                                    </div>
                                    <div class="sp-product-content">
                                        
                                        <h6 class="title">
                                            <a
                                                href="<?php echo e(url('/view-product-details?pid='.Crypt::encryptString($rowproduct->id).'&cid='.Crypt::encryptString($rowproduct->category_id).'&scid='.Crypt::encryptString($rowproduct->sub_category_id).'&scitemid='.Crypt::encryptString($rowproduct->sub_category_item_id))); ?>"
                                            >
                                                <?php echo e($rowproduct->name); ?>

                                            </a>
                                        </h6>
                                        <span class="product-status">IN Stock</span>
                                        <div class="sp-cart-wrap">
                                            
                                                <div class="cart-plus-minus specialproduct">
                                                    <?php if(Auth::check()): ?>
                                                    <input type="text" value="<?php echo e(GetCartCount($rowproduct->id)); ?>" id="<?php echo e($rowproduct->id); ?>" />
                                                    <?php else: ?>
                                                    <input type="text" value="0" id="<?php echo e($rowproduct->id); ?>" />
                                                    <?php endif; ?>
                                                </div>
                                                
                                        </div>
                                        <p><i class="fas fa-rupee-sign"></i><?php echo e(number_format($rowproduct->sale_price,2)); ?> - <?php echo e(Get_Variation_item_Name($rowproduct->Productwithvariationitem->variation_item_id)); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php $countspecialproduct++; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- special-products-area-end -->

    <!-- discount-area -->
    <section class="discount-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-8">
                    <div class="discount-item mb-20">
                        <div class="discount-thumb">
                            <img src="<?php echo e(asset('frontend/img/product/discount_img01.jpg')); ?>" alt="" />
                        </div>
                        <div class="discount-content">
                            <span>healthy food</span>
                            <h4 class="title"><a href="shop.html">100 organic UP TO 35%</a></h4>
                            <a href="shop.html" class="btn">shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-8">
                    <div class="discount-item mb-20">
                        <div class="discount-thumb">
                            <img src="<?php echo e(asset('frontend/img/product/discount_img02.jpg')); ?>" alt="" />
                        </div>
                        <div class="discount-content">
                            <span>healthy food</span>
                            <h4 class="title"><a href="shop.html">Hygienically Packed</a></h4>
                            <a href="shop.html" class="btn">shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-8">
                    <div class="discount-item style-two mb-20">
                        <div class="discount-thumb">
                            <img src="<?php echo e(asset('frontend/img/product/discount_img03.jpg')); ?>" alt="" />
                        </div>
                        <div class="discount-content">
                            <span>healthy food</span>
                            <h4 class="title"><a href="shop.html">baby favorite UP TO 15%</a></h4>
                            <a href="shop.html" class="btn">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- discount-area-end -->

    <!-- best-sellers-area -->
    <section class="best-sellers-area pt-75">
        <div class="container">
            <div class="row align-items-end mb-50">
                <div class="col-md-8 col-sm-9">
                    <div class="section-title">
                        <span class="sub-title">Best Sellers</span>
                        <h2 class="title">Best Offers View</h2>
                    </div>
                </div>
                <div class="col-md-4 col-sm-3">
                    <div class="section-btn text-left text-md-right">
                        <a href="<?php echo e(route('all-subcategory-item-list')); ?>" class="btn">View All</a>
                    </div>
                </div>
            </div>
            <div class="best-sellers-products">
                <div class="row justify-content-center">
                    <?php if($bestofferproduct): ?> <?php $__currentLoopData = $bestofferproduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowofferproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="sp-product-item mb-20">
                            <div class="sp-product-thumb">
                                <span class="batch">New</span>
                                <a href="<?php echo e(url('/view-product-details?pid='.Crypt::encryptString($rowofferproduct->id).'&cid='.Crypt::encryptString($rowofferproduct->category_id).'&scid='.Crypt::encryptString($rowofferproduct->sub_category_id).'&scitemid='.Crypt::encryptString($rowofferproduct->sub_category_item_id))); ?>">
                                    <img src="<?php echo e($rowofferproduct->productimage->image_url); ?>" alt="" />
                                </a>
                            </div>
                            <div class="sp-product-content">
                                
                                <h6 class="title">
                                    <a href="<?php echo e(url('/view-product-details?pid='.Crypt::encryptString($rowofferproduct->id).'&cid='.Crypt::encryptString($rowofferproduct->category_id).'&scid='.Crypt::encryptString($rowofferproduct->sub_category_id).'&scitemid='.Crypt::encryptString($rowofferproduct->sub_category_item_id))); ?>">
                                        <?php echo e($rowofferproduct->name); ?>

                                    </a>
                                </h6>
                                <span class="product-status">IN Stock</span>
                                <div class="sp-cart-wrap">
                                    
                                    <div class="cart-plus-minus specialproduct">
                                        <?php if(Auth::check()): ?>
                                        <input type="text" value="<?php echo e(GetCartCount($rowofferproduct->id)); ?>" id="<?php echo e($rowofferproduct->id); ?>" />
                                        <?php else: ?>
                                        <input type="text" value="0" id="<?php echo e($rowofferproduct->id); ?>" />
                                        <?php endif; ?>
                                    </div>

                                </div>
                                <p><i class="fas fa-rupee-sign"></i><?php echo e(number_format($rowofferproduct->sale_price,2)); ?> - <?php echo e(Get_Variation_item_Name($rowofferproduct->Productwithvariationitem->variation_item_id)); ?></p>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- best-sellers-area-end -->
</main>
<!-- main-area-end -->

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body"></div>
        </div>
    </div>
</div>

<?php $__env->startPush('frontend-scripts'); ?>
<script>
    $(".specialproduct").append('<div class="dec qtybutton">-</div><div class="inc qtybutton">+</div>');
    $(".qtybutton").on("click", function () {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;

            $button.parent().find("input").val(newVal);
            if(newVal>0){
                $productid = $button.parent().find("input").attr("id");
                <?php
                    if(Auth::check()){
                ?>
                    $.ajax({
                            type:'POST',
                            url:'<?php echo e(route("cart.add-to-cart-by-ajax")); ?>',
                            data:{productid:$productid, qty:newVal, _token: '<?php echo e(csrf_token()); ?>'},
                            success:function(result){
                                    $("#divToReload_WithDAta").load(location.href + " #divToReload_WithDAta");
                                    $(".modal-body").html(result+' Items Added To Cart Successfully.');
                                    $("#myModal").modal('show');
                                    var myInterval = setInterval(function() {
                                    $("#myModal").modal('hide');
                                    }, 3000);
                                    return false;
                            }
                    });
                <?php
                }else{
                ?>
                    window.location.href = "<?php echo e(route('login')); ?>";
                <?php
                }
                ?>
            }
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
                $button.parent().find("input").val(newVal);
                if(newVal>0){
                    $productid = $button.parent().find("input").attr("id");
                    <?php
                        if(Auth::check()){
                    ?>

                        $.ajax({
                                type:'POST',
                                url:'<?php echo e(route("cart.add-to-cart-by-ajax")); ?>',
                                data:{productid:$productid, qty:newVal, _token: '<?php echo e(csrf_token()); ?>'},
                                success:function(result){
                                        //alert(result); return false;
                                        $("#divToReload_WithDAta").load(location.href + " #divToReload_WithDAta");

                                        // $("#number_count_"+productid).val(qty);

                                        $(".modal-body").html(result+' Remove Item From Cart.');
                                        $("#myModal").modal('show');

                                        var myInterval = setInterval(function() {
                                        $("#myModal").modal('hide');

                                        }, 3000);


                                        return false;

                                }

                        });
                    <?php
                    }else{
                    ?>
                        window.location.href = "<?php echo e(route('login')); ?>";
                    <?php
                    }
                    ?>
                }
                if(newVal == 0){
                    $productid = $button.parent().find("input").attr("id");
                    <?php
                        if(Auth::check()){
                    ?>
                        $.ajax({
                                type:'POST',
                                url:'<?php echo e(route("cart.add-to-cart-by-ajax")); ?>',
                                data:{productid:$productid, qty:0, _token: '<?php echo e(csrf_token()); ?>'},
                                success:function(result){
                                    $("#divToReload_WithDAta").load(location.href + " #divToReload_WithDAta");
                                    $(".modal-body").html(result+' Remove Item From Cart.');
                                    $("#myModal").modal('show');

                                    var myInterval = setInterval(function() {
                                    $("#myModal").modal('hide');

                                    }, 3000);

                                    return false;
                                }
                        });
                    <?php
                    }else{
                    ?>
                        window.location.href = "<?php echo e(route('login')); ?>";
                    <?php
                    }
                    ?>
                }
            } else {
                newVal = 0;
                $(".modal-body").html('Quantity should be at least one.');
                $("#myModal").modal('show');

                var myInterval = setInterval(function() {
                $("#myModal").modal('hide');

                }, 3000);

            }
        }


    });
</script>
<?php $__env->stopPush(); ?> <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/welcome.blade.php ENDPATH**/ ?>