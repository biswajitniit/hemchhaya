 <?php $__env->startSection('title', 'Salesanta | Listing page sub category item'); ?> <?php $__env->startSection('content'); ?>

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
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item">
                                    <a href="<?php echo e(route('home.category-wise-landing-page',['catname='.create_slug($subcategory->categorys->category_name).'&catid='.Crypt::encryptString($subcategory->categorys->id)])); ?>">
                                        <?php echo e($subcategory->categorys->category_name); ?>

                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo e($subcategory->sub_category_name); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- shop-area -->
    <section class="shop--area pt-40 pb-15">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-3 order-2 order-lg-0">
                    <aside class="shop-sidebar">
                        <div class="widget shop-widget">
                            <div class="shop-widget-title">
                                <h6 class="title"><?php echo e($subcategory->sub_category_name); ?></h6>
                            </div>
                            <div class="shop-cat-list">
                                <ul>
                                    <li>
                                        <a href="<?php echo e(route('all-subcategory-item-list')); ?>">All<span>+</span></a>
                                    </li>
                                    <?php if($subcategoryitem): ?> <?php $__currentLoopData = $subcategoryitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a
                                            href="<?php echo e(route('home.sub-cat-item-landing-page',['subcatitemname='.create_slug($row->sub_category_item_name).'&cid='.Crypt::encryptString($row->category_id).'&scid='.Crypt::encryptString($row->sub_category_id).'&sciid='.Crypt::encryptString($row->id)])); ?>"
                                        >
                                            <?php echo e($row->sub_category_item_name); ?><span>+</span>
                                        </a>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-9">
                    <div class="shop-products-wrap">
                        <div class="row justify-content-center">
                            <?php if($product): ?> <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="sp-product-item">
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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-area-end -->
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/sub-category-item-wise-landing-page.blade.php ENDPATH**/ ?>