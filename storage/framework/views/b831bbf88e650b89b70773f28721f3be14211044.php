<?php $__env->startSection('title', 'Salesanta | SUb category wise page'); ?>
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
                                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e($category->category_name); ?></a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e($subcategory->sub_category_name); ?></a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e($subcategoryitem->sub_category_item_name); ?></a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo e($product->name); ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!-- shop-details-area -->
        <section class="shop-details-area pt-90 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="shop-details-flex-wrap _78xt5Y">
                            <div class="shop-details-nav-wrap">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="item-one-tab" data-toggle="tab" href="#item-one" role="tab" aria-controls="item-one" aria-selected="true"><img src="<?php echo e($product->front_view_image); ?>" alt="" /></a>
                                    </li>
                                    
                                </ul>
                            </div>
                            <div class="shop-details-img-wrap">
                                <div class="tab-content" id="myTabContent">
                                    

                                    <?php if($productimage): ?>
                                        <?php $__currentLoopData = $productimage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowimage => $imagevalue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($imagevalue->image_size == 'large'): ?>



                                                <div class="tab-pane fade <?php if($rowimage == 0): ?> show active <?php endif; ?> " id="item-<?php echo e($rowimage); ?>" role="tabpanel" aria-labelledby="item-<?php echo e($rowimage); ?>-tab">
                                                    <div class="shop-details-img">
                                                        <img src="<?php echo e($imagevalue->image_url); ?>" alt="">
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>



                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shop-details-content">
                            <h4 class="title"><?php echo e($product->name); ?></h4>
                            <div class="shop-details-meta">
                                <ul>
                                    <li>Brand : <a href="shop.html"><?php echo e(GetProductBrand($product->brand)); ?></a></li>
                                    <li class="shop-details-review">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span>Review</span>
                                    </li>
                                    <li>ID : <span><?php echo e($product->sku); ?></span></li>
                                </ul>
                            </div>
                            <div class="shop-details-price">
                                <h2 class="price"><i class="fas fa-rupee-sign"></i><?php echo e(number_format($product->sale_price,2)); ?></h2>
                                <h5 class="stock-status">- IN Stock <?php echo e($product->quantity); ?> Items </h5>
                            </div>
                            <div class="row pt-4 pb-4">
                                <?php if($variation): ?>
                                    <?php $__currentLoopData = $variation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowvariation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($rowvariation->id == $product->productwithvariation->variation_id): ?>

                                            <div class="col-6">
                                                <p><?php echo e($rowvariation->variation_name); ?></p>
                                                <ul class="swatch-quantity">

                                                    <?php if($variationitem): ?>
                                                        <?php $__currentLoopData = $variationitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowvariationitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($rowvariationitem->id == $product->productwithvariationitem->variation_item_id): ?>
                                                                <li class="active"><a href="#"><?php echo e($rowvariationitem->variation_item_name); ?></a></li>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>

                                                </ul>
                                            </div>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                            </div>

                            <?php echo substr($product->description,0,240).'...'; ?>

                            <div class="shop-details-list">
                                <?php echo $product->highlights ?>
                            </div>
                            

                            <div class="shop-perched-info">
                                <form action="<?php echo e(route('cart.add-to-cart')); ?>" name="addtocart" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="productid" value="<?php echo e($product->id); ?>">
                                    <div class="sd-cart-wrap">
                                        <div class="cart-plus-minus">
                                            <input type="text" name="qty" value="1">
                                        </div>
                                    </div>
                                    <button type="submit" name="addtocart" class="btn">add to cart</button> &nbsp;
                                </form>
                                <form action="<?php echo e(route('cart.add-to-cart')); ?>" name="addtocart" method="POST">
                                    <a href="#" class="btn"><i class="far fa-heart"></i></a>
                                </form>
                            </div>


                            

                            <div class="shop-details-bottom spec_">
                                <h4>Specifications </h4>
                                <?php if($productatwithattribute): ?>
                                    <?php $__currentLoopData = $productatwithattribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowproductattribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <h6><?php echo e(Get_Attribute_Name($rowproductattribute->attribute_id)); ?></h6>
                                            <?php if($productatwithattributeitem): ?>
                                                <?php $__currentLoopData = $productatwithattributeitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowproductatwithattributeitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($rowproductatwithattributeitem->attribute_id == $rowproductattribute->id): ?>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <p><?php echo e(Get_attribute_item_name($rowproductatwithattributeitem->attribute_item_id)); ?></p>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <p>
                                                                    <?php echo e($rowproductatwithattributeitem->attribute_item_value); ?>

                                                                </p>
                                                            </div>
                                                        </div>

                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>

                            </div>



                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-desc-wrap">
                            <ul class="nav nav-tabs" id="myTabTwo" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details"
                                        role="tab" aria-controls="details" aria-selected="true">Product Details</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                                        aria-controls="review" aria-selected="false">Product Reviews</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContentTwo">
                                <div class="tab-pane fade show active" id="details" role="tabpanel"
                                    aria-labelledby="details-tab">
                                    <div class="product-desc-content">
                                        <h4 class="title">Product Details</h4>
                                        <div class="row">
                                            <div class="col-xl-3 col-md-5">
                                                <div class="product-desc-img">
                                                    <img src="<?php echo e($product->front_view_image); ?>" alt="">
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-7">
                                                <?php echo $product->description ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <div class="product-desc-content">
                                        <h4 class="title">Product Details</h4>
                                        <div class="row">
                                            <div class="col-xl-3 col-md-5">
                                                <div class="product-desc-img">
                                                    <img src="img/product/desc_img.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-md-7">
                                                <h5 class="small-title">100% Natural Vitamin</h5>
                                                <p>Cramond Leopard & Pythong Print Anorak Jacket In Beige but also the
                                                    leap into electronic typesetting, remaining Lorem
                                                    Ipsum is simply dummy text of the printing and typesetting industry.
                                                    Lorem Ipsum has been the industry's standard dummy
                                                    text ever since the 1500s, when an unknown printer took a galley of
                                                    type and scrambled it to make a type specimen book.</p>
                                                <ul class="product-desc-list">
                                                    <li>65% poly, 35% rayon</li>
                                                    <li>Hand wash cold</li>
                                                    <li>Partially lined</li>
                                                    <li>Hidden front button closure with keyhole accents</li>
                                                    <li>Button cuff sleeves</li>
                                                    <li>Lightweight semi-sheer fabrication</li>
                                                    <li>Made in USA</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-details-area-end -->

        <!-- coupon-area -->
        <div class="coupon-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="coupon-bg">
                            <div class="coupon-title">
                                <span>Use coupon Code</span>
                                <h3 class="title">Get <i class="fas fa-rupee-sign"></i>3 Discount Code</h3>
                            </div>
                            <div class="coupon-code-wrap">
                                <h5 class="code">ganic21abs</h5>
                                <img src="img/images/coupon_code.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- coupon-area-end -->

        <!-- best-sellers-area -->
        
        <!-- best-sellers-area-end -->

    </main>
    <!-- main-area-end -->






<?php $__env->startPush('frontend-scripts'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/view-product-details.blade.php ENDPATH**/ ?>