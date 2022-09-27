
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
                        <div class="col-lg-7">
                            <div class="shop-details-flex-wrap">
                                <div class="shop-details-nav-wrap">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="item-one-tab" data-toggle="tab" href="#item-one" role="tab" aria-controls="item-one" aria-selected="true"><img src="<?php echo e($product->front_view_image); ?>" alt="" /></a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="item-two-tab" data-toggle="tab" href="#item-two" role="tab" aria-controls="item-two" aria-selected="false"><img src="<?php echo e($product->back_view_image); ?>" alt="" /></a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="item-three-tab" data-toggle="tab" href="#item-three" role="tab" aria-controls="item-three" aria-selected="false"><img src="<?php echo e($product->side_view_image); ?>" alt="" /></a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="item-four-tab" data-toggle="tab" href="#item-four" role="tab" aria-controls="item-four" aria-selected="false"><img src="<?php echo e($product->open_view_image); ?>" alt="" /></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="shop-details-img-wrap">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="item-one" role="tabpanel" aria-labelledby="item-one-tab">
                                            <div class="shop-details-img">
                                                <img src="<?php echo e($product->front_view_image); ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="item-two" role="tabpanel" aria-labelledby="item-two-tab">
                                            <div class="shop-details-img">
                                                <img src="<?php echo e($product->back_view_image); ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="item-three" role="tabpanel" aria-labelledby="item-three-tab">
                                            <div class="shop-details-img">
                                                <img src="<?php echo e($product->side_view_image); ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="item-four" role="tabpanel" aria-labelledby="item-four-tab">
                                            <div class="shop-details-img">
                                                <img src="<?php echo e($product->open_view_image); ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="shop-details-content">
                                <h4 class="title"><?php echo e($product->name); ?></h4>
                                <div class="shop-details-meta">
                                    <ul>
                                        <li>Baands : <a href="#"><?php echo e(GetProductBrand($product->brand)); ?></a></li>
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
                                        <li>SKU ID : <span><?php echo e($product->sku); ?></span></li>
                                    </ul>
                                </div>
                                <div class="shop-details-price">
                                    <h2 class="price"><i class="fas fa-rupee-sign"></i><?php echo e(number_format($product->sale_price,2)); ?></h2>
                                    <h5 class="stock-status">- IN Stock <?php echo e($product->quantity); ?> Items</h5>
                                </div>

                                <div class="row pt-4 pb-4">


                                        <?php $__currentLoopData = $variation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowvariation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($rowvariation->id == $product->productwithvariation->variation_id): ?>
                                                <div class="col-6">
                                                    <p> <?php echo e($rowvariation->variation_name); ?> </p>
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




                                </div>





                                <?php //echo $product->highlights ?>
                                <div class="shop-details-list">
                                   <?php //echo $product->highlights ?>
                                </div>


                                <form action="<?php echo e(route('cart.add-to-cart')); ?>" name="addtocart" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="productid" value="<?php echo e($product->id); ?>">
                                    <div class="shop-perched-info">
                                        <div class="sd-cart-wrap">

                                                <div class="cart-plus-minus">
                                                    <input type="text" name="qty" value="1">
                                                </div>

                                        </div>
                                        
                                        <button type="submit" name="addtocart" class="btn">add to cart</button>
                                    </div>
                                </form>

                                <div class="shop-details-bottom">
                                    <?php if($productatwithattribute): ?>
                                        <?php $__currentLoopData = $productatwithattribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowproductattribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <h5 class="title"><a href="#"> <?php echo e(Get_Attribute_Name($rowproductattribute->attribute_id)); ?></a></h5>
                                            <ul>

                                                <?php if($productatwithattributeitem): ?>
                                                    <?php $__currentLoopData = $productatwithattributeitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowproductatwithattributeitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($rowproductatwithattributeitem->attribute_id == $rowproductattribute->id): ?>
                                                            <li>
                                                                <span> <?php echo e(Get_attribute_item_name($rowproductatwithattributeitem->attribute_item_id)); ?> : </span>
                                                                <a href="#"><?php echo e($rowproductatwithattributeitem->attribute_item_value); ?></a>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>

                                            </ul>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>


                                </div>



                                <div class="shop-details-bottom">
                                    <h5 class="title"><a href="#"><i class="far fa-heart"></i> Add To Wishlist</a></h5>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="product-desc-wrap">
                                <ul class="nav nav-tabs" id="myTabTwo" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab"
                                            aria-controls="details" aria-selected="true">Product Details</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                                            aria-controls="review" aria-selected="false">Product Reviews</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContentTwo">
                                    <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                                        <div class="product-desc-content">

                                            <div class="row">

                                                <div class="col-xl-12 col-md-7">
                                                    <?php echo $product->description ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                        <div class="product-desc-content">
                                            <h4 class="title">Product Details</h4>
                                            <div class="row">
                                                <div class="col-xl-12 col-md-5">

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
            <section class="best-sellers-area pt-85 pb-70">
                <div class="container">
                    <div class="row align-items-end mb-40">
                        <div class="col-md-8 col-sm-9">
                            <div class="section-title">
                                <span class="sub-title">Related Products</span>
                                <h2 class="title">From this Collection</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-3">
                            <div class="section-btn text-left text-md-right">
                                <a href="shop.html" class="btn">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="best-sellers-products">
                        <div class="row justify-content-center">
                            <div class="col-3">
                                <div class="sp-product-item mb-20">
                                    <div class="sp-product-thumb">
                                        <span class="batch">New</span>
                                        <a href="shop-details.html"><img src="img/product/sp_products09.png" alt=""></a>
                                    </div>
                                    <div class="sp-product-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h6 class="title"><a href="shop-details.html">Uncle Orange Vanla Ready Pice</a></h6>
                                        <span class="product-status">IN Stock</span>
                                        <div class="sp-cart-wrap">
                                            <form action="#">
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="1">
                                                </div>
                                            </form>
                                        </div>
                                        <p><i class="fas fa-rupee-sign"></i>1.50 - 1 kg</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="sp-product-item mb-20">
                                    <div class="sp-product-thumb">
                                        <span class="batch discount">15%</span>
                                        <a href="shop-details.html"><img src="img/product/sp_products02.png" alt=""></a>
                                    </div>
                                    <div class="sp-product-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h6 class="title"><a href="shop-details.html">Dannon Max Vanla ice cream</a></h6>
                                        <span class="product-status">IN Stock</span>
                                        <div class="sp-cart-wrap">
                                            <form action="#">
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="1">
                                                </div>
                                            </form>
                                        </div>
                                        <p><i class="fas fa-rupee-sign"></i>3.50 - 1 lt</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="sp-product-item mb-20">
                                    <div class="sp-product-thumb">
                                        <span class="batch discount">25%</span>
                                        <a href="shop-details.html"><img src="img/product/sp_products03.png" alt=""></a>
                                    </div>
                                    <div class="sp-product-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h6 class="title"><a href="shop-details.html">Walnuts Max Vanla Greek Pice</a></h6>
                                        <span class="product-status">IN Stock</span>
                                        <div class="sp-cart-wrap">
                                            <form action="#">
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="1">
                                                </div>
                                            </form>
                                        </div>
                                        <p><i class="fas fa-rupee-sign"></i>2.99 - 1 kg</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="sp-product-item mb-20">
                                    <div class="sp-product-thumb">
                                        <span class="batch">new</span>
                                        <a href="shop-details.html"><img src="img/product/sp_products04.png" alt=""></a>
                                    </div>
                                    <div class="sp-product-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h6 class="title"><a href="shop-details.html">Brachs Bens Vanla Ready Pice</a></h6>
                                        <span class="product-status">IN Stock</span>
                                        <div class="sp-cart-wrap">
                                            <form action="#">
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="1">
                                                </div>
                                            </form>
                                        </div>
                                        <p><i class="fas fa-rupee-sign"></i>2.99 - 1 kg</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="sp-product-item mb-20">
                                    <div class="sp-product-thumb">
                                        <span class="batch discount">25%</span>
                                        <a href="shop-details.html"><img src="img/product/sp_products05.png" alt=""></a>
                                    </div>
                                    <div class="sp-product-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h6 class="title"><a href="shop-details.html">Black Lady Vanla Greek Grapes</a></h6>
                                        <span class="product-status">IN Stock</span>
                                        <div class="sp-cart-wrap">
                                            <form action="#">
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="1">
                                                </div>
                                            </form>
                                        </div>
                                        <p><i class="fas fa-rupee-sign"></i>5.99 - 1 kg</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- best-sellers-area-end -->

        </main>
        <!-- main-area-end -->






<?php $__env->startPush('frontend-scripts'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/view-product-details.blade.php ENDPATH**/ ?>