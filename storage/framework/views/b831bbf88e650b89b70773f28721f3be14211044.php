<?php $__env->startSection('title', 'Salesanta | Product details page'); ?>
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
                                    <li class="breadcrumb-item"><a href="<?php echo e(route('home.sub-cat-item-landing-page',['subcatitemname='.create_slug($subcategoryitem->sub_category_item_name).'&cid='.Crypt::encryptString($category->id).'&scid='.Crypt::encryptString($subcategory->id).'&sciid='.Crypt::encryptString($subcategoryitem->id)])); ?>"><?php echo e($subcategoryitem->sub_category_item_name); ?></a></li>
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
        <section class="shop-details-area pt-15 pb-15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="shop-details-flex-wrap _78xt5Y">
                            <div class="shop-details-nav-wrap">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    <?php if($productimage): ?>
                                        <?php $count = 1; ?>
                                        <?php $__currentLoopData = $productimage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowimagesmall => $imagevaluesmall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($imagevaluesmall->image_size == 'small'): ?>

                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link <?php if($count == 1): ?> active <?php endif; ?>" id="item-<?php echo e($count); ?>-tab" data-toggle="tab" href="#item-<?php echo e($count); ?>" role="tab" aria-controls="item-<?php echo e($count); ?>" aria-selected="true">
                                                        <img src="<?php echo e($imagevaluesmall->image_url); ?>" alt="" />
                                                    </a>
                                                </li>
                                                <?php $count++; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </ul>
                            </div>
                            <div class="shop-details-img-wrap">
                                <div class="tab-content" id="myTabContent">

                                    <?php if($productimage): ?>
                                        <?php $countone = 1; ?>
                                        <?php $__currentLoopData = $productimage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowimage => $imagevalue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($imagevalue->image_size == 'large'): ?>
                                                <div class="tab-pane fade <?php if($countone == 1): ?> show active <?php endif; ?> " id="item-<?php echo e($countone); ?>" role="tabpanel" aria-labelledby="item-<?php echo e($countone); ?>-tab">
                                                    <div class="shop-details-img">
                                                        <img src="<?php echo e($imagevalue->image_url); ?>" alt="">
                                                    </div>
                                                </div>
                                                <?php $countone++; ?>
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



                            <div class="shop-details-list">
                                <?php echo $product->highlights ?>
                            </div>


                            <?php if(Auth::user()): ?>
                                <?php
                                    $countcartexistcheck = Checkuseralreadyaddedtocart(Auth::user()->id,$product->id);
                                ?>
                                <?php if($countcartexistcheck > 0): ?>
                                <div class="shop-perched-info">
                                    <a href="<?php echo e(route('cart')); ?>" class="btn">Go to cart</a>
                                </div>

                                <?php else: ?>
                                <div class="shop-perched-info">
                                    <form action="<?php echo e(route('cart.add-to-cart')); ?>" name="addtocart" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="productid" value="<?php echo e($product->id); ?>">
                                        <input type="hidden" name="qty" value="1">
                                        <button type="submit" name="addtocart" class="btn">add to cart</button> &nbsp;
                                    </form>
                                </div>
                                <?php endif; ?>

                            <?php else: ?>
                                <div class="shop-perched-info">
                                    <form action="<?php echo e(route('cart.add-to-cart')); ?>" name="addtocart" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="productid" value="<?php echo e($product->id); ?>">
                                        <input type="hidden" name="qty" value="1">
                                        <button type="submit" name="addtocart" class="btn">add to cart</button> &nbsp;
                                    </form>
                                    
                                </div>

                            <?php endif; ?>




                            

                            <div class="shop-details-bottom spec_">
                                <h4>Specifications </h4>
                                <?php if($productatwithattribute): ?>
                                    <?php $__currentLoopData = $productatwithattribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowproductattribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <h6><?php echo e(Get_Attribute_Name($rowproductattribute->attribute_id)); ?></h6>
                                            <?php if($productatwithattributeitem): ?>
                                                <?php $__currentLoopData = $productatwithattributeitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowproductatwithattributeitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($rowproductatwithattributeitem->attribute_id == $rowproductattribute->attribute_id): ?>

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

                                <h6>Description</h6>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Description</p>
                                    </div>
                                    <div class="col-md-8">
                                            <?php echo $product->description ?>
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
        
        <!-- coupon-area-end -->

        <!-- best-sellers-area -->
        <section class="best-sellers-area pt-25 pb-15">
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