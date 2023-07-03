@extends('layouts.app')
@section('title', 'Salesanta | Homepage')
@section('content')



        <!-- main-area -->
        <main>

            <!-- slider-area -->
            <section class="slider-area" data-background="{{ asset('frontend/img/bg/slider_area_bg.jpg') }}">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-active">

                                @if(!$banner->isEmpty())
                                    @foreach($banner as $row)
                                        <div class="single-slider slider-bg" data-background="{{ $row->banner_image }}">
                                            <div class="slider-content">
                                                <h5 class="sub-title" data-animation="fadeInUp" data-delay=".2s">{{ $row->banner_text_top }}</h5>
                                                <h2 class="title" data-animation="fadeInUp" data-delay=".4s">{{ $row->banner_text_middle }}</h2>
                                                <p data-animation="fadeInUp" data-delay=".6s">{{ $row->banner_text_buttom }}</p>
                                                <a href="{{ $row->banner_url }}" class="btn rounded-btn" data-animation="fadeInUp" data-delay=".8s">Shop Now</a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

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
                                <a href="shop.html" class="btn">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="special-products-wrap">
                        <div class="row">
                            {{-- <div class="col-3 d-none d-lg-block">
                                <div class="special-products-add">
                                    <div class="sp-add-thumb">
                                        <img src="{{ asset('frontend/img/product/special_products_add.jpg') }}" alt="">
                                    </div>
                                    <div class="sp-add-content">
                                        <span class="sub-title">healthy food</span>
                                        <h4 class="title">baby favorite <b>Product</b></h4>
                                        <p>Super Offer TO 50% OFF</p>
                                        <a href="shop.html" class="btn rounded-btn">shop now</a>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="sp-product-item mb-20">
                                            <div class="sp-product-thumb">
                                                <span class="batch">New</span>
                                                <a href="shop-details.html"><img src="{{ asset('frontend/img/product/sp_products01.png') }}" alt=""></a>
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
                                        <div class="sp-product-item mb-20">
                                            <div class="sp-product-thumb">
                                                <span class="batch discount">15%</span>
                                                <a href="shop-details.html"><img src="{{ asset('frontend/img/product/sp_products02.png') }}" alt=""></a>
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
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="sp-product-item mb-20">
                                            <div class="sp-product-thumb">
                                                <span class="batch discount">25%</span>
                                                <a href="shop-details.html"><img src="{{ asset('frontend/img/product/sp_products03.png') }}" alt=""></a>
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
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="sp-product-item mb-20">
                                            <div class="sp-product-thumb">
                                                <span class="batch">new</span>
                                                <a href="shop-details.html"><img src="{{ asset('frontend/img/product/sp_products04.png') }}" alt=""></a>
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
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="sp-product-item mb-20">
                                            <div class="sp-product-thumb">
                                                <span class="batch discount">25%</span>
                                                <a href="shop-details.html"><img src="{{ asset('frontend/img/product/sp_products05.png') }}" alt=""></a>
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
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="sp-product-item mb-20">
                                            <div class="sp-product-thumb">
                                                <span class="batch">new</span>
                                                <a href="shop-details.html"><img src="{{ asset('frontend/img/product/sp_products06.png') }}" alt=""></a>
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
                                                <p><i class="fas fa-rupee-sign"></i>0.99 - 1 kg</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="sp-product-item mb-20">
                                            <div class="sp-product-thumb">
                                                <span class="batch discount">10%</span>
                                                <a href="shop-details.html"><img src="{{ asset('frontend/img/product/sp_products07.png') }}" alt=""></a>
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
                                                <p><i class="fas fa-rupee-sign"></i>1.99 - 1 kg</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="sp-product-item mb-20">
                                            <div class="sp-product-thumb">
                                                <span class="batch discount">10%</span>
                                                <a href="shop-details.html"><img src="{{ asset('frontend/img/product/sp_products08.png') }}" alt=""></a>
                                            </div>
                                            <div class="sp-product-content">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <h6 class="title"><a href="shop-details.html">Organic Rice Max Greek Pice</a></h6>
                                                <span class="product-status">IN Stock</span>
                                                <div class="sp-cart-wrap">
                                                    <form action="#">
                                                        <div class="cart-plus-minus">
                                                            <input type="text" value="1">
                                                        </div>
                                                    </form>
                                                </div>
                                                <p><i class="fas fa-rupee-sign"></i>3.99 - 1 kg</p>
                                            </div>
                                        </div>
                                    </div>
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
                                    <img src="{{ asset('frontend/img/product/discount_img01.jpg') }}" alt="">
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
                                    <img src="{{ asset('frontend/img/product/discount_img02.jpg') }}" alt="">
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
                                    <img src="{{ asset('frontend/img/product/discount_img03.jpg') }}" alt="">
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
                                        <a href="shop-details.html"><img src="{{ asset('frontend/img/product/sp_products09.png') }}" alt=""></a>
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
                                        <a href="shop-details.html"><img src="{{ asset('frontend/img/product/sp_products02.png') }}" alt=""></a>
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
                                        <a href="shop-details.html"><img src="{{ asset('frontend/img/product/sp_products03.png') }}" alt=""></a>
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
                                        <a href="shop-details.html"><img src="{{ asset('frontend/img/product/sp_products04.png') }}" alt=""></a>
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
                                        <a href="shop-details.html"><img src="{{ asset('frontend/img/product/sp_products05.png') }}" alt=""></a>
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


    @push('frontend-scripts')

    @endpush

@endsection
