@extends('layouts.app')
@section('title', 'Salesanta | Listing page sub category item')
@section('content')



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
                                <li class="breadcrumb-item"><a href="{{ route('home.category-wise-landing-page',['catname='.create_slug($subcategory->categorys->category_name).'&catid='.Crypt::encryptString($subcategory->categorys->id)]) }}">{{ $subcategory->categorys->category_name }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $subcategory->sub_category_name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- shop-area -->
    <section class="shop--area pt-40 pb-15">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-3 order-2 order-lg-0">
                    <aside class="shop-sidebar">
                        <div class="widget shop-widget">
                            <div class="shop-widget-title">
                                <h6 class="title">{{ $subcategory->sub_category_name }}</h6>
                            </div>
                            <div class="shop-cat-list">
                                <ul>
                                    <li><a href="{{ route('all-subcategory-item-list') }}">All<span>+</span></a></li>
                                    @if ($subcategoryitem)
                                        @foreach ($subcategoryitem as $row)
                                        <li><a href="{{ route('home.sub-cat-item-landing-page',['subcatitemname='.create_slug($row->sub_category_item_name).'&cid='.Crypt::encryptString($row->category_id).'&scid='.Crypt::encryptString($row->sub_category_id).'&sciid='.Crypt::encryptString($row->id)]) }}">{{ $row->sub_category_item_name }}<span>+</span></a></li>
                                        @endforeach
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-9">


                    <div class="shop-products-wrap">
                        <div class="row justify-content-center">

                            @if ($product)
                                @foreach ($product as $rowproduct)
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="sp-product-item">
                                            <div class="sp-product-thumb">
                                                <span class="batch">New</span>
                                                <a href="{{ url('/view-product-details?pid='.Crypt::encryptString($rowproduct->id).'&cid='.Crypt::encryptString($rowproduct->category_id).'&scid='.Crypt::encryptString($rowproduct->sub_category_id).'&scitemid='.Crypt::encryptString($rowproduct->sub_category_item_id)) }}"><img src="{{ $rowproduct->productimage->image_url }}" alt=""></a>
                                            </div>
                                            <div class="sp-product-content">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <h6 class="title"><a href="{{ url('/view-product-details?pid='.Crypt::encryptString($rowproduct->id).'&cid='.Crypt::encryptString($rowproduct->category_id).'&scid='.Crypt::encryptString($rowproduct->sub_category_id).'&scitemid='.Crypt::encryptString($rowproduct->sub_category_item_id)) }}">{{ $rowproduct->name }}</a></h6>
                                                <span class="product-status">IN Stock</span>
                                                <div class="sp-cart-wrap">
                                                    <form action="#">
                                                        <div class="cart-plus-minus">
                                                            <input type="text" value="1">
                                                        </div>
                                                    </form>
                                                </div>
                                                {{-- <p><i class="fas fa-rupee-sign"></i>{{ number_format($rowproduct->sale_price,2) }} - {{ Get_Variation_item_Name($rowproduct->Productwithvariationitem->variation_item_id) }}</p> --}}
                                                <p><i class="fas fa-rupee-sign"></i>{{ number_format($rowproduct->sale_price,2) }} - {{ Get_Variation_item_Name($rowproduct->Productwithvariationitem->variation_item_id) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- shop-area-end -->

</main>
<!-- main-area-end -->






@push('frontend-scripts')

@endpush

@endsection
