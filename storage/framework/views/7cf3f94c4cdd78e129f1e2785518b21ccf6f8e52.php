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
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('home.category-wise-landing-page',['catname='.create_slug($subcategory->categorys->category_name).'&catid='.Crypt::encryptString($subcategory->categorys->id)])); ?>"><?php echo e($subcategory->categorys->category_name); ?></a></li>
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
    <section class="shop--area pt-90 pb-90">
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
                                    <li><a href="#">All<span>+</span></a></li>
                                    <?php if($subcategoryitem): ?>
                                        <?php $__currentLoopData = $subcategoryitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="shop.html"><?php echo e($row->sub_category_item_name); ?><span>+</span></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </ul>
                            </div>
                        </div>
                        <div class="widget shop-widget">
                            <div class="shop-widget-title">
                                <h6 class="title">Filter By Price</h6>
                            </div>
                            <div class="price_filter">
                                <div id="slider-range"></div>
                                <div class="price_slider_amount">
                                    <span>Price :</span>
                                    <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                </div>
                            </div>
                        </div>
                        <div class="widget shop-widget">
                            <div class="shop-widget-title">
                                <h6 class="title">NEW PRODUCT</h6>
                            </div>
                            <div class="sidebar-product-list">
                                <ul>
                                    <li>
                                        <div class="sidebar-product-thumb">
                                            <a href="shop-details.html"><img src="<?php echo e(asset('frontend/img/product/sidebar_product01.jpg')); ?>" alt=""></a>
                                        </div>
                                        <div class="sidebar-product-content">
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Uncle Bens Vanla</a></h5>
                                            <span><i class="fas fa-rupee-sign"></i>39.00</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-product-thumb">
                                            <a href="shop-details.html"><img src="<?php echo e(asset('frontend/img/product/sidebar_product02.jpg')); ?>" alt=""></a>
                                        </div>
                                        <div class="sidebar-product-content">
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Dannon Max</a></h5>
                                            <span><i class="fas fa-rupee-sign"></i>29.00</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-product-thumb">
                                            <a href="shop-details.html"><img src="<?php echo e(asset('frontend/img/product/sidebar_product03.jpg')); ?>" alt=""></a>
                                        </div>
                                        <div class="sidebar-product-content">
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Vanla Greek Pice</a></h5>
                                            <span><i class="fas fa-rupee-sign"></i>35.00</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget shop-widget">
                            <div class="shop-widget-title">
                                <h6 class="title">BRANDS</h6>
                            </div>
                            <div class="shop-cat-list">
                                <ul>
                                    <li><a href="shop.html">Adara <span>+</span></a></li>
                                    <li><a href="shop.html">Carnation <span>+</span></a></li>
                                    <li><a href="shop.html">We Beyond <span>+</span></a></li>
                                    <li><a href="shop.html">Agrifram <span>+</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="shop-widget-banner text-center">
                                <a href="shop.html"><img src="<?php echo e(asset('frontend/img/product/sidebar_shop_ad.jpg')); ?>" alt=""></a>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-9">
                    <div class="shop-discount-area">
                        <div class="discount-content shop-discount-content">
                            <span>healthy food</span>
                            <h4 class="title"><a href="shop.html">organic farm for ganic</a></h4>
                            <p>Super Offer TO 50% OFF</p>
                            <a href="shop.html" class="btn rounded-btn">shop now</a>
                        </div>
                    </div>
                    <div class="shop-top-meta mb-30">
                        <div class="row">
                            <div class="col-md-6 col-sm-7">
                                <div class="shop-top-left">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-bars"></i> FILTER</a></li>
                                        <li>Showing 1–9 of 80 results</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-5">
                                <div class="shop-top-right">
                                    <form action="#">
                                        <select name="select">
                                            <option value="popularity">Popularity</option>
                                            <option value="price-low-to-high">Price -- Low to High</option>
                                            <option value="price-high-to-low">Price -- High to Low</option>
                                            <option value="discount">Discount</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shop-products-wrap">
                        <div class="row justify-content-center">

                            <?php if($product): ?>
                                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="sp-product-item">
                                            <div class="sp-product-thumb">
                                                <span class="batch">New</span>
                                                <a href="<?php echo e(url('/view-product-details?pid='.Crypt::encryptString($rowproduct->id).'&cid='.Crypt::encryptString($rowproduct->category_id).'&scid='.Crypt::encryptString($rowproduct->sub_category_id).'&scitemid='.Crypt::encryptString($rowproduct->sub_category_item_id))); ?>"><img src="<?php echo e($rowproduct->front_view_image); ?>" alt=""></a>
                                            </div>
                                            <div class="sp-product-content">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <h6 class="title"><a href="<?php echo e(url('/view-product-details?pid='.Crypt::encryptString($rowproduct->id).'&cid='.Crypt::encryptString($rowproduct->category_id).'&scid='.Crypt::encryptString($rowproduct->sub_category_id).'&scitemid='.Crypt::encryptString($rowproduct->sub_category_item_id))); ?>"><?php echo e($rowproduct->name); ?></a></h6>
                                                <span class="product-status">IN Stock</span>
                                                <div class="sp-cart-wrap">
                                                    <form action="#">
                                                        <div class="cart-plus-minus">
                                                            <input type="text" value="1">
                                                        </div>
                                                    </form>
                                                </div>
                                                
                                                <p><i class="fas fa-rupee-sign"></i><?php echo e(number_format($rowproduct->sale_price,2)); ?> - <?php echo e(Get_Variation_item_Name($rowproduct->Productwithvariationitem->variation_item_id)); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>








                        </div>
                    </div>
                    <div class="pagination-wrap">
                        <ul>
                            <li class="prev"><a href="shop.html">Prev</a></li>
                            <li><a href="shop.html">1</a></li>
                            <li class="active"><a href="shop.html">2</a></li>
                            <li><a href="shop.html">3</a></li>
                            <li><a href="shop.html">4</a></li>
                            <li><a href="shop.html">...</a></li>
                            <li><a href="shop.html">10</a></li>
                            <li class="next"><a href="shop.html">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-area-end -->

</main>
<!-- main-area-end -->






<?php $__env->startPush('frontend-scripts'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/sub-category-wise-page.blade.php ENDPATH**/ ?>