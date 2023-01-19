
<?php $__env->startSection('title', 'Salesanta | Listing page sub category item'); ?>
<?php $__env->startSection('content'); ?>



<!-- main-area -->
<main>

    <!-- breadcrumb-area -->
    
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
                        
                    </aside>
                </div>
                <div class="col-9">
                    
                    <div class="shop-top-meta mb-30">
                        <div class="row">
                            <div class="col-md-6 col-sm-7">
                                <div class="shop-top-left">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-bars"></i> Page 1 of 100</a></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-5">
                                <div class="shop-top-right">
                                    <form action="#">
                                        <select name="select">
                                            
                                            <option value="price-low-to-high">Price -- Low to High</option>
                                            <option value="price-high-to-low">Price -- High to Low</option>
                                            
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
                                                <a href="<?php echo e(url('/view-product-details?pid='.Crypt::encryptString($rowproduct->id).'&cid='.Crypt::encryptString($rowproduct->category_id).'&scid='.Crypt::encryptString($rowproduct->sub_category_id).'&scitemid='.Crypt::encryptString($rowproduct->sub_category_item_id))); ?>"><img src="<?php echo e($rowproduct->productimage->image_url); ?>" alt=""></a>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/sub-category-item-wise-landing-page.blade.php ENDPATH**/ ?>