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

                                    <?php if($subcategoryitem): ?>
                                        <?php $__currentLoopData = $subcategoryitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="shop.html"><?php echo e($row->sub_category_item_name); ?></a></li>
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
                                            <a href="shop-details.html"><img src="img/product/sidebar_product01.jpg" alt=""></a>
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
                                            <a href="shop-details.html"><img src="img/product/sidebar_product02.jpg" alt=""></a>
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
                                            <a href="shop-details.html"><img src="img/product/sidebar_product03.jpg" alt=""></a>
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
                                <a href="shop.html"><img src="img/product/sidebar_shop_ad.jpg" alt=""></a>
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
                                            <option value="">Sort by newness</option>
                                            <option>Free Shipping</option>
                                            <option>Best Match</option>
                                            <option>Newest Item</option>
                                            <option>Size A - Z</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shop-products-wrap">
                        <div class="row justify-content-center">
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="sp-product-item">
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
                                        <h6 class="title"><a href="shop-details.html">Uncle Orange Bens Ready Pice</a></h6>
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
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="sp-product-item">
                                    <div class="sp-product-thumb">
                                        <span class="batch discount">25%</span>
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
                                        <h6 class="title"><a href="shop-details.html">Dannon Max Vanla Ice Cream</a></h6>
                                        <span class="product-status">IN Stock</span>
                                        <div class="sp-cart-wrap">
                                            <form action="#">
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="1">
                                                </div>
                                            </form>
                                        </div>
                                        <p><i class="fas fa-rupee-sign"></i>1.50 - 1 lt</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="sp-product-item">
                                    <div class="sp-product-thumb">
                                        <span class="batch discount">25%</span>
                                        <a href="shop-details.html"><img src="img/product/sp_products10.png" alt=""></a>
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
                                        <p><i class="fas fa-rupee-sign"></i>1.50 - 1 kg</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="sp-product-item">
                                    <div class="sp-product-thumb">
                                        <span class="batch">New</span>
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
                                        <h6 class="title"><a href="shop-details.html">Uncle Bens Vanla Ready Pice</a></h6>
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
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="sp-product-item">
                                    <div class="sp-product-thumb">
                                        <span class="batch discount">25%</span>
                                        <a href="shop-details.html"><img src="img/product/sp_products11.png" alt=""></a>
                                    </div>
                                    <div class="sp-product-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h6 class="title"><a href="shop-details.html">Capsicum Vanla Ben Ready Pice</a></h6>
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
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="sp-product-item">
                                    <div class="sp-product-thumb">
                                        <span class="batch">New</span>
                                        <a href="shop-details.html"><img src="img/product/sp_products06.png" alt=""></a>
                                    </div>
                                    <div class="sp-product-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h6 class="title"><a href="shop-details.html">Potato Max Vanla Greek Pice</a></h6>
                                        <span class="product-status">IN Stock</span>
                                        <div class="sp-cart-wrap">
                                            <form action="#">
                                                <div class="cart-plus-minus">
                                                    <input type="text" value="1">
                                                </div>
                                            </form>
                                        </div>
                                        <p><i class="fas fa-rupee-sign"></i>1.99 - 1 kg</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="sp-product-item">
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
                                        <p><i class="fas fa-rupee-sign"></i>1.50 - 1 kg</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="sp-product-item">
                                    <div class="sp-product-thumb">
                                        <span class="batch">New</span>
                                        <a href="shop-details.html"><img src="img/product/sp_products12.png" alt=""></a>
                                    </div>
                                    <div class="sp-product-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h6 class="title"><a href="shop-details.html">Strawberry Vanla Ready Pice</a></h6>
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
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="sp-product-item">
                                    <div class="sp-product-thumb">
                                        <span class="batch discount">25%</span>
                                        <a href="shop-details.html"><img src="img/product/sp_products01.png" alt=""></a>
                                    </div>
                                    <div class="sp-product-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h6 class="title"><a href="shop-details.html">Uncle Bens Vanla Ready Pice</a></h6>
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
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="sp-product-item">
                                    <div class="sp-product-thumb">
                                        <span class="batch discount">25%</span>
                                        <a href="shop-details.html"><img src="img/product/sp_products15.png" alt=""></a>
                                    </div>
                                    <div class="sp-product-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h6 class="title"><a href="shop-details.html">Broccoli Bens Vanla Ready Pice</a></h6>
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
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="sp-product-item">
                                    <div class="sp-product-thumb">
                                        <span class="batch">New</span>
                                        <a href="shop-details.html"><img src="img/product/sp_products13.png" alt=""></a>
                                    </div>
                                    <div class="sp-product-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h6 class="title"><a href="shop-details.html">Aubergine Bens Ready Pice</a></h6>
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
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="sp-product-item">
                                    <div class="sp-product-thumb">
                                        <span class="batch discount">25%</span>
                                        <a href="shop-details.html"><img src="img/product/sp_products14.png" alt=""></a>
                                    </div>
                                    <div class="sp-product-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h6 class="title"><a href="shop-details.html">Onion Bens Vanla Ready Pice</a></h6>
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