@extends('layouts.app')
@section('title', 'Salesanta | Category wise landing page')
@section('content')



<!-- main-area -->
<main>
    <!-- breadcrumb-area -->
    {{-- <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">Shop By {{ $subcategoryitem->sub_category_item_name }} </h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Shop By {{ $subcategoryitem->sub_category_item_name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- breadcrumb-area-end -->



    <!-- services-area -->
    <section class="services-area services-bg">
        <div class="container">
            <div class="container-inner-wrap">
                <div class="row justify-content-center">

                    @if ($subcategoryitem)
                        @foreach ($subcategoryitem as $row)
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                                <div class="services-item">
                                    <div class="content">
                                        <h5>
                                             <a href="{{ route('home.sub-cat-item-landing-page',['subcatitemname='.create_slug($row->sub_category_item_name).'&cid='.Crypt::encryptString($row->category_id).'&scid='.Crypt::encryptString($row->sub_category_id).'&sciid='.Crypt::encryptString($row->id)]) }}">{{$row->sub_category_item_name }}</a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </section>
    <!-- services-area-emd -->

    {{-- <div class="container custom-container">
        <div class="slider-category-wrap">
            <div class="row category-active slick-initialized slick-slider">
                <div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 1128px; transform: translate3d(0px, 0px, 0px);"><div class="col-lg-2 slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 188px;" tabindex="0">
                    <div class="category-item active">
                        <a href="shop.html" class="category-link" tabindex="0"></a>
                        <div class="category-thumb">
                            <img src="http://localhost:8000/frontend/img/product/category_img01.png" alt="">
                        </div>
                        <div class="category-content">
                            <h6 class="title">Juice &amp; Drinks</h6>
                        </div>
                    </div>
                </div><div class="col-lg-2 slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 188px;" tabindex="0">
                    <div class="category-item">
                        <a href="shop.html" class="category-link" tabindex="0"></a>
                        <div class="category-thumb">
                            <img src="http://localhost:8000/frontend/img/product/category_img02.png" alt="">
                        </div>
                        <div class="category-content">
                            <h6 class="title">Vegetables</h6>
                        </div>
                    </div>
                </div><div class="col-lg-2 slick-slide slick-active" data-slick-index="2" aria-hidden="false" style="width: 188px;" tabindex="0">
                    <div class="category-item">
                        <a href="shop.html" class="category-link" tabindex="0"></a>
                        <div class="category-thumb">
                            <img src="http://localhost:8000/frontend/img/product/category_img03.png" alt="">
                        </div>
                        <div class="category-content">
                            <h6 class="title">Fresh Nuts</h6>
                        </div>
                    </div>
                </div><div class="col-lg-2 slick-slide slick-active" data-slick-index="3" aria-hidden="false" style="width: 188px;" tabindex="0">
                    <div class="category-item">
                        <a href="shop.html" class="category-link" tabindex="0"></a>
                        <div class="category-thumb">
                            <img src="http://localhost:8000/frontend/img/product/category_img04.png" alt="">
                        </div>
                        <div class="category-content">
                            <h6 class="title">Cleaning</h6>
                        </div>
                    </div>
                </div><div class="col-lg-2 slick-slide slick-active" data-slick-index="4" aria-hidden="false" style="width: 188px;" tabindex="0">
                    <div class="category-item">
                        <a href="shop.html" class="category-link" tabindex="0"></a>
                        <div class="category-thumb">
                            <img src="http://localhost:8000/frontend/img/product/category_img05.png" alt="">
                        </div>
                        <div class="category-content">
                            <h6 class="title">fresh meat</h6>
                        </div>
                    </div>
                </div><div class="col-lg-2 slick-slide slick-active" data-slick-index="5" aria-hidden="false" style="width: 188px;" tabindex="0">
                    <div class="category-item">
                        <a href="shop.html" class="category-link" tabindex="0"></a>
                        <div class="category-thumb">
                            <img src="http://localhost:8000/frontend/img/product/category_img06.png" alt="">
                        </div>
                        <div class="category-content">
                            <h6 class="title">Powders</h6>
                        </div>
                    </div>
                </div></div></div>





            </div>
        </div>
    </div> --}}


</main>
<!-- main-area-end -->






@push('frontend-scripts')

@endpush

@endsection
