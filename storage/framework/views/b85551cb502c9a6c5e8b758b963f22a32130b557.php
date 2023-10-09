<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

        <!-- CSS here -->
        <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('frontend/css/animate.min.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('frontend/css/magnific-popup.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('frontend/css/fontawesome-all.min.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('frontend/css/jquery-ui.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('frontend/css/flaticon.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('frontend/css/aos.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('frontend/css/slick.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('frontend/css/default.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('frontend/css/responsive.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('frontend/css/validationEngine.jquery.css')); ?>" />
        <style type="text/css">
            .ui-menu .ui-menu-item a {
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        <header>
            <!-- header-message -->
            
            <!-- header-message-end -->

            <!-- header-top-start -->
            <div class="header-top-wrap">
                <div class="container custom-container">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="header-top-left">
                                <ul>
                                        
                                    <li class="header-work-time">Working time: <span> Mon - Sat : 8:00 - 21:00</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="header-top-right">
                                <ul>
                                    <?php if(Auth::check()): ?>
                                    <li><a href="<?php echo e(url('/user/dashboard')); ?>">My Account</a></li>
                                    <?php else: ?>
                                    <li><a href="<?php echo e(url('/login')); ?>">My Account</a></li>
                                    <?php endif; ?>
                                    <li><a href="<?php echo e(url('about-us')); ?>">About Us</a></li>
                                    <li><a href="<?php echo e(url('contact-us')); ?>">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-top-end -->

            <!-- header-search-area -->
            <div class="header-search-area">
                <div class="container custom-container">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-3 d-none d-lg-block">
                            <div class="logo">
                                <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('frontend/img/logo/logo.png')); ?>" alt="Logo" /></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-9">
                            <div class="d-block d-sm-flex align-items-center justify-content-end">
                                <div class="header-search-wrap">
                                    <form action="#">

                                        

                                        <input type="text" id="autocomplete" placeholder="Search Product..." />
                                        <button><i class="flaticon-loupe-1"></i></button>
                                    </form>
                                </div>
                                <div class="header-action" id="divToReload_WithDAta">
                                    <ul>
                                        <li class="header-phone">
                                            <div class="icon"><i class="flaticon-telephone"></i></div>
                                            <a href="tel:6291643488"><span>Call Us Now</span>6291643488 </a>
                                        </li>
                                        <li class="header-user">
                                            <?php if(Auth::check()): ?>
                                            <a href="<?php echo e(url('/user/dashboard')); ?>"><i class="flaticon-user"></i></a>
                                            <?php else: ?>
                                            <a href="<?php echo e(url('/login')); ?>"><i class="flaticon-user"></i></a>
                                            <?php endif; ?>
                                        </li>
                                        <li class="header-wishlist">
                                            <a href="#"><i class="flaticon-heart-shape-outline"></i></a>
                                            <span class="item-count">0</span>
                                        </li>

                                        <li class="header-cart-action">
                                            <div class="header-cart-wrap">
                                                <a href="<?php echo e(url('cart')); ?>"><i class="flaticon-shopping-basket"></i></a>
                                                <span class="item-count">
                                                    <?php if(Auth::check()): ?> <?php $cartcontent = Get_session_user_cart_info(Auth::user()->id); ?> <?php echo e(sizeof($cartcontent)); ?> <?php else: ?> 0 <?php endif; ?>
                                                </span>
                                                <ul class="minicart">
                                                    <?php if(Auth::check()): ?> <?php $cartcontent = Get_session_user_cart_info(Auth::user()->id); ?> <?php if($cartcontent): ?> <?php $total1 = 0; ?> <?php $__currentLoopData = $cartcontent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php $total1 =
                                                    $total1 + $row1->price; ?>
                                                    <li class="d-flex align-items-start">
                                                        <div class="cart-img">
                                                            <a href="<?php echo e(ViewProductDetails($row1->product_id)); ?>"><img src="<?php echo e($row1->image); ?>" alt="" /></a>
                                                        </div>
                                                        <div class="cart-content">
                                                            <h4><a href="<?php echo e(ViewProductDetails($row1->product_id)); ?>"><?php echo e($row1->name); ?></a></h4>
                                                            <div class="cart-price">
                                                                <span class="new"><i class="fas fa-rupee-sign"></i><?php echo e(str_replace(',', '', number_format($row1->price, 2))); ?></span>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="del-icon">
                                                            <a href="#"><i class="far fa-trash-alt"></i></a>
                                                        </div>
                                                    </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>

                                                    <li>
                                                        <div class="total-price">
                                                            <span class="f-left">Total:</span>
                                                            <span class="f-right"><i class="fas fa-rupee-sign"></i><?php echo e(str_replace(',', '', number_format($total1, 2))); ?></span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkout-link">
                                                            <a href="<?php echo e(url('/cart')); ?>">Shopping Cart</a>
                                                            <a class="black-color" href="<?php echo e(url('/checkout')); ?>">Checkout</a>
                                                        </div>
                                                    </li>

                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-search-area-end -->

            <div id="sticky-header" class="menu-area">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                            <div class="menu-wrap">
                                <nav class="menu-nav">
                                    <div class="logo d-block d-lg-none">
                                        <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('frontend/img/logo/logo.png')); ?>" alt="" /></a>
                                    </div>
                                    <div class="header-category d-none d-lg-block">
                                        <a href="#" class="cat-toggle"><i class="fas fa-bars"></i>ALL Categories<i class="fas fa-angle-down"></i></a>
                                        <ul class="category-menu">
                                            <?php $menuheadershow = Get_active_menu_show_in_header(); ?> <?php if($menuheadershow): ?> <?php $__currentLoopData = $menuheadershow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowactivemenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <a
                                                    href="<?php echo e(route('home.sub-cat-item-landing-page',['subcatitemname='.create_slug($rowactivemenu->sub_category_item_name).'&cid='.Crypt::encryptString($rowactivemenu->category_id).'&scid='.Crypt::encryptString($rowactivemenu->sub_category_id).'&sciid='.Crypt::encryptString($rowactivemenu->id)])); ?>"
                                                >
                                                    <?php echo e($rowactivemenu->sub_category_item_name); ?>

                                                </a>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                            <li>
                                                <a href="<?php echo e(route('all-subcategory-item-list')); ?>"> <i class="fa fa-plus" aria-hidden="true"></i> More Categories </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="navbar-wrap main-menu d-none d-lg-flex">
                                        <ul class="navigation">
                                            <li class="active"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                            <?php $menuheadershow = Get_active_menu_show_in_header(); ?> <?php if($menuheadershow): ?> <?php $__currentLoopData = $menuheadershow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowactivemenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <li>
                                                <a
                                                    href="<?php echo e(route('home.sub-cat-item-landing-page',['subcatitemname='.create_slug($rowactivemenu->sub_category_item_name).'&cid='.Crypt::encryptString($rowactivemenu->category_id).'&scid='.Crypt::encryptString($rowactivemenu->sub_category_id).'&sciid='.Crypt::encryptString($rowactivemenu->id)])); ?>"
                                                >
                                                    <?php echo e($rowactivemenu->sub_category_item_name); ?>

                                                </a>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                        </ul>
                                    </div>
                                    
                                </nav>
                            </div>
                            <!-- Mobile Menu  -->
                            <div class="mobile-menu">
                                <nav class="menu-box">
                                    <div class="close-btn"><i class="fas fa-times"></i></div>
                                    <div class="nav-logo">
                                        <a href="index.html"><img src="<?php echo e(asset('frontend/img/logo/logo.png')); ?>" alt="" title="" /></a>
                                    </div>
                                    <div class="menu-outer">
                                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                    </div>
                                    <div class="social-links">
                                        <ul class="clearfix">
                                            <li>
                                                <a href="#"><span class="fab fa-twitter"></span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="fab fa-facebook-f"></span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="fab fa-pinterest-p"></span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="fab fa-instagram"></span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="fab fa-youtube"></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="menu-backdrop"></div>
                            <!-- End Mobile Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-area-end -->

        <?php echo $__env->yieldContent('content'); ?>

        <!-- footer-area -->
        <footer>
            <div class="footer-area gray-bg mt-60 pt-80 pb-30">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="footer-widget mb-50">
                                <div class="footer-logo mb-25">
                                    <a href="index.html"><img src="<?php echo e(asset('frontend/img/logo/logo.png')); ?>" alt="" /></a>
                                </div>
                                <div class="footer-contact-list">
                                    <ul>
                                        <li>
                                            <div class="icon"><i class="flaticon-place"></i></div>
                                            <p>
                                                2/50/A, Vidyasagar Colony, Naktala,<br />
                                                kolkata, west bengal, pin-700047
                                            </p>
                                        </li>
                                        <li>
                                            <div class="icon"><i class="flaticon-telephone-1"></i></div>
                                            <h5 class="number"><a href="tel:12027993245">+91 6291643488</a></h5>
                                        </li>
                                        
                                        <li>
                                            <div class="icon"><i class="flaticon-wall-clock"></i></div>
                                            <p>sales@salesanta.com</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="footer-social">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-youtube"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="footer-widget mb-50">
                                <div class="fw-title">
                                    <h5 class="title">Useful Links</h5>
                                </div>
                                <div class="fw-link">
                                    <ul>
                                        <li><a href="checkout.html">Delivery</a></li>
                                        <li><a href="terms-conditios.html">Legal Notice</a></li>
                                        <li><a href="about-us.html">About us</a></li>
                                        <li><a href="contact.html">Sitemap</a></li>
                                        <li><a href="checkout.html">Track Your Orders</a></li>
                                        <li><a href="index.html">Footer Links</a></li>
                                        <li><a href="terms-conditios.html">Orders and Returns</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="footer-widget footer-box-widget mb-50">
                                <div class="f-download-wrap">
                                    <div class="fw-title">
                                        <h5 class="title">Download App</h5>
                                    </div>
                                    <div class="download-btns">
                                        <a href="index.html"><img src="img/icon/g_play.png" alt="" /></a>
                                        <a href="index.html"><img src="img/icon/app_store.png" alt="" /></a>
                                    </div>
                                </div>
                                <div class="f-newsletter">
                                    <div class="fw-title">
                                        <h5 class="title">Newsletter</h5>
                                    </div>
                                    <form action="#">
                                        <input type="email" placeholder="Email Address" />
                                        <button><i class="flaticon-send"></i></button>
                                    </form>
                                    <p>Do Not Show Your Mail</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="copyright-text">
                                <p>Copyright &copy; <?php echo e(date('Y')); ?> Salesanta || All Rights Reserved</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="payment-accepted text-center text-md-right">
                                <img src="<?php echo e(asset('frontend/img/images/payment_card.png')); ?>" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-area-end -->

        <!-- JS here -->
        
        <script src="<?php echo e(asset('frontend/js/vendor/jquery-3.6.0.min.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/js/isotope.pkgd.min.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/js/imagesloaded.pkgd.min.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/js/jquery.magnific-popup.min.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/js/jquery.countdown.min.js')); ?>"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
        <script src="<?php echo e(asset('frontend/js/slick.min.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/js/ajax-form.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/js/wow.min.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/js/aos.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/js/plugins.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/js/jquery.validationEngine-en.js')); ?>"></script>
        <script src="<?php echo e(asset('frontend/js/jquery.validationEngine.min.js')); ?>"></script>

        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <script type="">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({ pageLanguage: "en" }, "google_translate_element");
            }

            $(document).ready(function() {
                var data = [
                        <?php
                        $subcategoryitem = getSubCategoryProductList();
                        if(!$subcategoryitem->isEmpty()) {
                            foreach($subcategoryitem as $rowsubcategory){
                        ?>
                            { label: '<?php echo $rowsubcategory->sub_category_item_name ?>', value: '<?php echo route('home.sub-cat-item-landing-page',['subcatitemname='.create_slug($rowsubcategory->sub_category_item_name).'&cid='.Crypt::encryptString($rowsubcategory->category_id).'&scid='.Crypt::encryptString($rowsubcategory->sub_category_id).'&sciid='.Crypt::encryptString($rowsubcategory->id)]) ?>'},
                        <?php
                            }
                        }
                        ?>
                    ];
                $("input#autocomplete").autocomplete({
                    source: data,
                    focus: function (event, ui) {
                        $(event.target).val(ui.item.label);
                        return false;
                    },
                    select: function (event, ui) {
                        $(event.target).val(ui.item.label);
                        window.location = ui.item.value;
                        return false;
                    }
                });
            });
        </script>
        <?php echo $__env->yieldPushContent('frontend-scripts'); ?>
    </body>
</html>
<?php /**PATH E:\webdev\hemchhaya\resources\views/layouts/app.blade.php ENDPATH**/ ?>