@extends('layouts.app')
@section('title', 'Salesanta | About Us')
@section('content')


        <!-- main-area -->
        <main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb-area breadcrumb-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content">
                                <h2 class="title">About Us</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">About us</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- ingredients-area -->
            <section class="ingredients-area pt-90 pb-90">
                <div class="container">
                    <div class="ingredients-inner-wrap">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <div class="ingredients-img">
                                    <img src="{{ asset('frontend/img/images/ingredients_img.jpg') }}" alt="">
                                    <div class="active-years">
                                        <h2 class="title">2+ <span>Years</span></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="ingredients-content-wrap">
                                    <div class="ingredients-section-title">
                                        <span class="sub-title">ingredients</span>
                                        <h2 class="title">Store Primarily Engaged in General Range</h2>
                                    </div>
                                    <p>Kamin ipsum is simply dummy the prinng and tysetting industry. Lorem ipsum has been the industry's standard dummy everince
                                    when unknown printer took galley.</p>

                                    <div class="ingredients-btn-wrap">
                                        <a href="shop.html" class="btn">Shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ingredients-area-end -->

            <!-- services-area -->
            <section class="services-area services-bg">
                <div class="container">
                    <div class="container-inner-wrap">
                        <div class="row justify-content-center">
                            <div class="col-xl-7 col-lg-9">
                                <div class="services-section-title text-center mb-55">
                                    <h2 class="title">What We Provide?</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                    aliqua minim.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                                <div class="services-item">
                                    <a href="contact.html" class="services-link"></a>
                                    <div class="icon"><i class="flaticon-return"></i></div>
                                    <div class="content">
                                        <h5>Easy Returns<span class="new">NEW</span></h5>
                                        <p>Knowledge base that organized collection system</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                                <div class="services-item">
                                    <a href="contact.html" class="services-link"></a>
                                    <div class="icon"><i class="flaticon-delivery"></i></div>
                                    <div class="content">
                                        <h5>Free Delivery</h5>
                                        <p>Knowledge base that organized collection system</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                                <div class="services-item">
                                    <a href="contact.html" class="services-link"></a>
                                    <div class="icon"><i class="flaticon-like-1"></i></div>
                                    <div class="content">
                                        <h5>Daily Deals Discount</h5>
                                        <p>Knowledge base that organized collection system</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- services-area-emd -->

            <!-- newsletter-area -->
            <section class="newsletter-area pt-90 pb-90">
                <div class="container">
                    <div class="container-inner-wrap">
                        <div class="row">
                            <div class="col-12">
                                <div class="newsletter-wrap">
                                    <h2 class="title">Are you ready to get your <span>business grossing</span></h2>
                                    <div class="newsletter-form">
                                        <form action="#">
                                            <input type="email" placeholder="Email address">
                                            <button class="btn">subscribe</button>
                                        </form>
                                    </div>
                                    <img src="{{ asset('frontend/img/images/newsletter_shape01.png') }}" alt="" class="newsletter-shape top-shape wow fadeInDownBig" data-wow-delay=".3s">
                                    <img src="{{ asset('frontend/img/images/newsletter_shape02.png') }}" alt="" class="newsletter-shape bottom-shape wow fadeInUpBig" data-wow-delay=".3s">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- newsletter-area-end -->

            <!-- online-support-area -->
            <section class="online-support-area">
                <div class="container">
                    <div class="container-inner-wrap">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-5">
                                <div class="online-support-img">
                                    <img src="{{ asset('frontend/img/images/support_img.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="online-support-content">
                                    <h2 class="title">Ganic Online Support</h2>
                                    <p>Tamin ipsum is simply dummy the prinng and tysetting industry. Lorem ipsum has been the industry's standard dummy that everince prinng
                                    when unknown printer took galley.</p>
                                    <div class="support-info-wrap">
                                        <ul>
                                            <li>
                                                <div class="support-info-item">
                                                    <p>Around the clock support</p>
                                                    <h2><i class="flaticon-24-hour-service"></i> 24/7</h2>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="support-info-item">
                                                    <p>customer happiness rating</p>
                                                    <h2><i class="flaticon-happy-1"></i> 98.9%</h2>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- online-support-area-end -->

        </main>
        <!-- main-area-end -->


@push('frontend-scripts')

@endpush

@endsection
