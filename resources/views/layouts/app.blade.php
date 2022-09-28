<!doctype html>
<html class="no-js" lang="">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/default.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
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
            <div class="header-message-wrap">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="top-notify-message">
                                <p>place your complaints (if any) within 24hrs of receiving your delivery</p>
                                <span class="message-remove">X</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-message-end -->

            <!-- header-top-start -->
            <div class="header-top-wrap">
                <div class="container custom-container">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="header-top-left">
                                <ul>
                                    <!-- <li class="header-top-lang">
                                        <div class="dropdown">
                                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">English</button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                <a class="dropdown-item" href="index.html">Spanish</a>
                                                <a class="dropdown-item" href="index.html">Chinese</a>
                                                <a class="dropdown-item" href="index.html">Hindi</a>
                                            </div>
                                        </div>
                                    </li> -->
                                    <!-- <li class="header-top-currency">
                                        <div class="dropdown">
                                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">USD - US Dollar</button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                                <a class="dropdown-item" href="index.html">INR - IN Rupe</a>
                                                <a class="dropdown-item" href="index.html">BDT - BD Taka</a>
                                                <a class="dropdown-item" href="index.html">SAR - SA Riyal</a>
                                            </div>
                                        </div>
                                    </li> -->
                                        <li class="header-work-time">
                                            Working time: <span> Mon - Sat : 8:00 - 21:0</span>
                                        </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="header-top-right">
                                <ul>
                                    @if(Auth::check())
                                    <li><a href="{{ url('/user/dashboard') }}">My Account</a></li>
                                    @else
                                    <li><a href="{{ url('/login') }}">My Account</a></li>
                                    @endif



                                        <li><a href="contact.html">My Account</a></li>
                                         <li><a href="contact.html">Contact</a></li>
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
                                <a href="{{ url('/') }}"><img src="{{ asset('frontend/img/logo/logo.png') }}" alt="Logo"></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-9">
                            <div class="d-block d-sm-flex align-items-center justify-content-end">
                                <div class="header-search-wrap">
                                    <form action="#">
                                        <select class="custom-select">
                                            <option selected="">All Categories</option>
                                            <option>-- Grocery & Frozen</option>
                                            <option>-- Fresh Fruits</option>
                                            <option>-- Fresh Fish</option>
                                            <option>-- Fresh Nuts</option>
                                            <option>-- Fresh Meats</option>
                                            <option>-- Bread & Bakery</option>
                                            <option>-- Vegetable</option>
                                            <option>-- Kids Food</option>
                                            <option>-- Dried Fruits</option>
                                            <option>-- Others Food</option>
                                        </select>
                                        <input type="text" placeholder="Search Product...">
                                        <button><i class="flaticon-loupe-1"></i></button>
                                    </form>
                                </div>
                                <div class="header-action">
                                    <ul>
                                        <li class="header-phone">
                                            <div class="icon"><i class="flaticon-telephone"></i></div>
                                            <a href="tel:6291643488"><span>Call Us Now</span>+91 6291643488
                                            </a>
                                        </li>
                                        <li class="header-user"><a href="#"><i class="flaticon-user"></i></a></li>
                                        <li class="header-wishlist">
                                            <a href="#"><i class="flaticon-heart-shape-outline"></i></a>
                                            <span class="item-count">0</span>
                                        </li>
                                        <li class="header-cart-action">
                                            <div class="header-cart-wrap">
                                                <a href="cart.html"><i class="flaticon-shopping-basket"></i></a>
                                                <span class="item-count">2</span>
                                                <ul class="minicart">
                                                    <li class="d-flex align-items-start">
                                                        <div class="cart-img">
                                                            <a href="shop-details.html"><img src="{{ asset('frontend/img/product/cart_p01.jpg') }}" alt=""></a>
                                                        </div>
                                                        <div class="cart-content">
                                                            <h4><a href="shop-details.html">Organic Farm Fresh Nuts</a></h4>
                                                            <div class="cart-price">
                                                                <span class="new"><i class="fas fa-rupee-sign"></i>229.9</span>
                                                                <span><del><i class="fas fa-rupee-sign"></i>229.9</del></span>
                                                            </div>
                                                        </div>
                                                        <div class="del-icon">
                                                            <a href="#"><i class="far fa-trash-alt"></i></a>
                                                        </div>
                                                    </li>
                                                    <li class="d-flex align-items-start">
                                                        <div class="cart-img">
                                                            <a href="shop-details.html"><img src="img/product/cart_p02.jpg" alt=""></a>
                                                        </div>
                                                        <div class="cart-content">
                                                            <h4><a href="shop-details.html">Organic Fresh Nuts Vanla Butter</a></h4>
                                                            <div class="cart-price">
                                                                <span class="new"><i class="fas fa-rupee-sign"></i>229.9</span>
                                                                <span><del><i class="fas fa-rupee-sign"></i>229.9</del></span>
                                                            </div>
                                                        </div>
                                                        <div class="del-icon">
                                                            <a href="#"><i class="far fa-trash-alt"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="total-price">
                                                            <span class="f-left">Total:</span>
                                                            <span class="f-right"><i class="fas fa-rupee-sign"></i>239.9</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="checkout-link">
                                                            <a href="cart.html">Shopping Cart</a>
                                                            <a class="black-color" href="checkout.html">Checkout</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="cart-amount"><i class="fas fa-rupee-sign"></i>0.00</div>
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
                                        <a href="index.html"><img src="{{ asset('frontend/img/logo/logo.png') }}" alt=""></a>
                                    </div>
                                    <div class="header-category d-none d-lg-block">
                                        <a href="#" class="cat-toggle"><i class="fas fa-bars"></i>ALL Categories<i class="fas fa-angle-down"></i></a>
                                        <ul class="category-menu">
                                            @php
                                                $getCategory = Get_Category_List_Menu();
                                            @endphp
                                            @if ($getCategory)
                                                @foreach ($getCategory as $rowcategory)
                                                    @if ($rowcategory->menu_dropdown) <!-- // FOR MENU DROP DOWN -->
                                                        <li class="menu-item-has-children"><a href="{{ url('/') }}"><i class="flaticon-groceries"></i> {{ $rowcategory->category_name }}</a>
                                                            <ul class="megamenu">
                                                                @php
                                                                  $getSubCategory = Get_Sub_Category_List_Menu($rowcategory->id);
                                                                @endphp
                                                                @if ($getSubCategory)
                                                                    @foreach ($getSubCategory as $rowsubcategory)
                                                                        <li class="sub-column-item"><a href="{{ url('/') }}">{{ $rowsubcategory->sub_category_name }}</a>
                                                                            <ul>
                                                                                @php
                                                                                    $getSubCategoryItem = Get_Sub_Category_Item_List_Menu($rowsubcategory->id);
                                                                                @endphp
                                                                                @if ($getSubCategoryItem)
                                                                                    @foreach ($getSubCategoryItem as $rowsubcategoryitem)
                                                                                        <li><a href="{{ url('/') }}">{{ $rowsubcategoryitem->sub_category_item_name }}</a></li>
                                                                                    @endforeach
                                                                                @endif
                                                                            </ul>
                                                                        </li>
                                                                    @endforeach
                                                                @endif
                                                            </ul>
                                                        </li>
                                                    @else <!-- // FOR MENU SINGLE -->
                                                        <li><a href="{{ url('/') }}"><i class="flaticon-broccoli"></i> {{ $rowcategory->category_name }} </a></li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="navbar-wrap main-menu d-none d-lg-flex">
                                        <ul class="navigation">

                                            <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                            @php
                                            $menuheadershow = Get_active_menu_show_in_header();
                                            @endphp
                                            @if ($menuheadershow)
                                                @foreach ($menuheadershow as $rowactivemenu)
                                                    <li><a href="{{ route('home.category-wise-landing-page',['catname='.create_slug($rowactivemenu->category_name).'&catid='.Crypt::encryptString($rowactivemenu->id)]) }}">{{ $rowactivemenu->category_name }}</a></li>
                                                @endforeach
                                            @endif

                                        </ul>
                                    </div>
                                    {{-- <div class="header-super-store d-none d-xl-block d-lg-none d-md-block">
                                        <div class="dropdown">
                                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><i class="flaticon-shop"></i> Super Store</button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                                <a class="dropdown-item" href="shop.html">Super Store 01</a>
                                                <a class="dropdown-item" href="shop.html">Super Store 02</a>
                                                <a class="dropdown-item" href="shop.html">Super Store 03</a>
                                            </div>
                                        </div>
                                    </div> --}}
                                </nav>
                            </div>
                            <!-- Mobile Menu  -->
                            <div class="mobile-menu">
                                <nav class="menu-box">
                                    <div class="close-btn"><i class="fas fa-times"></i></div>
                                    <div class="nav-logo"><a href="index.html"><img src="{{ asset('frontend/img/logo/logo.png') }}" alt="" title=""></a>
                                    </div>
                                    <div class="menu-outer">
                                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                    </div>
                                    <div class="social-links">
                                        <ul class="clearfix">
                                            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                            <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                            <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                            <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                            <li><a href="#"><span class="fab fa-youtube"></span></a></li>
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



        @yield('content')


        <!-- footer-area -->
        <footer>
            <div class="footer-area gray-bg mt-60 pt-80 pb-30">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="footer-widget mb-50">
                                <div class="footer-logo mb-25">
                                    <a href="index.html"><img src="{{ asset('frontend/img/logo/logo.png') }}" alt=""></a>
                                </div>
                                <div class="footer-contact-list">
                                    <ul>
                                        <li>
                                            <div class="icon"><i class="flaticon-place"></i></div>
                                            <p>
                                                2/50/A, Vidyasagar Colony, Naktala,<br>
                                                kolkata, west bengal, pin-700047
                                            </p>
                                        </li>
                                        <li>
                                            <div class="icon"><i class="flaticon-telephone-1"></i></div>
                                            <h5 class="number"><a href="tel:12027993245">+91 6291643488</a></h5>
                                        </li>
                                        {{-- <li>
                                            <div class="icon"><i class="flaticon-mail"></i></div>
                                            <p><a href="https://themebeyond.com/cdn-cgi/l/email-protection#80f3f5f0f0eff2f4c0f6e5e7e5eeaee3efed"><span class="__cf_email__" data-cfemail="47343237372835330731222022296924282a">[email&#160;protected]</span></a></p>
                                        </li> --}}
                                        <li>
                                            <div class="icon"><i class="flaticon-wall-clock"></i></div>
                                            <p>sales@salesanta.com</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="footer-social">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="footer-widget mb-50">
                                <div class="fw-title">
                                    <h5 class="title">Customer Service</h5>
                                </div>
                                <div class="fw-link">
                                    <ul>
                                        <li><a href="shop.html">Secure Shopping</a></li>
                                        <li><a href="cart.html">Order Status</a></li>
                                        <li><a href="shop.html">International Shipping</a></li>
                                        <li><a href="checkout.html">Payment Method</a></li>
                                        <li><a href="blog.html">Our Blog</a></li>
                                        <li><a href="terms-conditios.html">Orders and Returns</a></li>
                                        <li><a href="checkout.html">Track Your Orders</a></li>
                                        <li><a href="index.html">Footer Links</a></li>
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
                                        <a href="index.html"><img src="img/icon/g_play.png" alt=""></a>
                                        <a href="index.html"><img src="img/icon/app_store.png" alt=""></a>
                                    </div>
                                </div>
                                <div class="f-newsletter">
                                    <div class="fw-title">
                                        <h5 class="title">Newsletter</h5>
                                    </div>
                                    <form action="#">
                                        <input type="email" placeholder="Email Address">
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
                                <p>Copyright &copy; 2022 Salesanta || All Rights Reserved</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="payment-accepted text-center text-md-right">
                                <img src="{{ asset('frontend/img/images/payment_card.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-area-end -->





        <!-- JS here -->
        {{-- <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
        <script src="{{ asset('frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
        <script src="{{ asset('frontend/js/ajax-form.js') }}"></script>
        <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
        <script src="{{ asset('frontend/js/aos.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins.js') }}"></script>
        <script src="{{ asset('frontend/js/main.js') }}"></script>

        @stack('frontend-scripts')
    </body>
</html>
