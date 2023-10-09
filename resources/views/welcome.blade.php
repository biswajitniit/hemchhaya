@extends('layouts.app') @section('title', 'Salesanta | Homepage') @section('content')

<!-- main-area -->
<main>
    <!-- slider-area -->
    <section class="slider-area" data-background="{{ asset('frontend/img/bg/slider_area_bg.jpg') }}">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="slider-active">
                        @if(!$banner->isEmpty()) @foreach($banner as $row)
                        <div class="single-slider slider-bg" data-background="{{ $row->banner_image }}">
                            <div class="slider-content">
                                <h5 class="sub-title" data-animation="fadeInUp" data-delay=".2s">{{ $row->banner_text_top }}</h5>
                                <h2 class="title" data-animation="fadeInUp" data-delay=".4s">{{ $row->banner_text_middle }}</h2>
                                <p data-animation="fadeInUp" data-delay=".6s">{{ $row->banner_text_buttom }}</p>
                                <a href="{{ $row->banner_url }}" class="btn rounded-btn" data-animation="fadeInUp" data-delay=".8s">Shop Now</a>
                            </div>
                        </div>
                        @endforeach @endif
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
                        <a href="{{ route('all-subcategory-item-list')}}" class="btn">View All</a>
                    </div>
                </div>
            </div>
            <div class="special-products-wrap">
                <div class="row">
                    {{--
                    <div class="col-3 d-none d-lg-block">
                        <div class="special-products-add">
                            <div class="sp-add-thumb">
                                <img src="{{ asset('frontend/img/product/special_products_add.jpg') }}" alt="" />
                            </div>
                            <div class="sp-add-content">
                                <span class="sub-title">healthy food</span>
                                <h4 class="title">baby favorite <b>Product</b></h4>
                                <p>Super Offer TO 50% OFF</p>
                                <a href="shop.html" class="btn rounded-btn">shop now</a>
                            </div>
                        </div>
                    </div>
                    --}}
                    <div class="col-12">
                        <div class="row justify-content-center">
                            @if ($specialproduct) @php $countspecialproduct = 1; @endphp @foreach ($specialproduct as $rowproduct)
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="sp-product-item mb-20">
                                    <div class="sp-product-thumb">
                                        <span class="batch">New</span>
                                        <a
                                            href="{{ url('/view-product-details?pid='.Crypt::encryptString($rowproduct->id).'&cid='.Crypt::encryptString($rowproduct->category_id).'&scid='.Crypt::encryptString($rowproduct->sub_category_id).'&scitemid='.Crypt::encryptString($rowproduct->sub_category_item_id)) }}"
                                        >
                                            <img src="{{ $rowproduct->productimage->image_url }}" alt="" />
                                        </a>
                                    </div>
                                    <div class="sp-product-content">
                                        {{--
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        --}}
                                        <h6 class="title">
                                            <a
                                                href="{{ url('/view-product-details?pid='.Crypt::encryptString($rowproduct->id).'&cid='.Crypt::encryptString($rowproduct->category_id).'&scid='.Crypt::encryptString($rowproduct->sub_category_id).'&scitemid='.Crypt::encryptString($rowproduct->sub_category_item_id)) }}"
                                            >
                                                {{ $rowproduct->name }}
                                            </a>
                                        </h6>
                                        <span class="product-status">IN Stock</span>
                                        <div class="sp-cart-wrap">
                                            {{--
                                            <form action="#">
                                                --}}
                                                <div class="cart-plus-minus specialproduct">
                                                    @if(Auth::check())
                                                    <input type="text" value="{{ GetCartCount($rowproduct->id) }}" id="{{$rowproduct->id}}" />
                                                    @else
                                                    <input type="text" value="0" id="{{$rowproduct->id}}" />
                                                    @endif
                                                </div>
                                                {{--
                                            </form>
                                            --}}
                                        </div>
                                        <p><i class="fas fa-rupee-sign"></i>{{ number_format($rowproduct->sale_price,2) }} - {{ Get_Variation_item_Name($rowproduct->Productwithvariationitem->variation_item_id) }}</p>
                                    </div>
                                </div>
                            </div>
                            @php $countspecialproduct++; @endphp @endforeach @endif
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
                            <img src="{{ asset('frontend/img/product/discount_img01.jpg') }}" alt="" />
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
                            <img src="{{ asset('frontend/img/product/discount_img02.jpg') }}" alt="" />
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
                            <img src="{{ asset('frontend/img/product/discount_img03.jpg') }}" alt="" />
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
                        <a href="{{ route('all-subcategory-item-list')}}" class="btn">View All</a>
                    </div>
                </div>
            </div>
            <div class="best-sellers-products">
                <div class="row justify-content-center">
                    @if ($bestofferproduct) @foreach ($bestofferproduct as $rowofferproduct)

                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="sp-product-item mb-20">
                            <div class="sp-product-thumb">
                                <span class="batch">New</span>
                                <a href="{{ url('/view-product-details?pid='.Crypt::encryptString($rowofferproduct->id).'&cid='.Crypt::encryptString($rowofferproduct->category_id).'&scid='.Crypt::encryptString($rowofferproduct->sub_category_id).'&scitemid='.Crypt::encryptString($rowofferproduct->sub_category_item_id)) }}">
                                    <img src="{{ $rowofferproduct->productimage->image_url }}" alt="" />
                                </a>
                            </div>
                            <div class="sp-product-content">
                                {{--
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                --}}
                                <h6 class="title">
                                    <a href="{{ url('/view-product-details?pid='.Crypt::encryptString($rowofferproduct->id).'&cid='.Crypt::encryptString($rowofferproduct->category_id).'&scid='.Crypt::encryptString($rowofferproduct->sub_category_id).'&scitemid='.Crypt::encryptString($rowofferproduct->sub_category_item_id)) }}">
                                        {{ $rowofferproduct->name }}
                                    </a>
                                </h6>
                                <span class="product-status">IN Stock</span>
                                <div class="sp-cart-wrap">
                                    {{-- <form action="#">
                                        <div class="cart-plus-minus">
                                            <input type="text" value="1" />
                                        </div>
                                    </form> --}}
                                    <div class="cart-plus-minus specialproduct">
                                        @if(Auth::check())
                                        <input type="text" value="{{ GetCartCount($rowofferproduct->id) }}" id="{{$rowofferproduct->id}}" />
                                        @else
                                        <input type="text" value="0" id="{{$rowofferproduct->id}}" />
                                        @endif
                                    </div>

                                </div>
                                <p><i class="fas fa-rupee-sign"></i>{{ number_format($rowofferproduct->sale_price,2) }} - {{ Get_Variation_item_Name($rowofferproduct->Productwithvariationitem->variation_item_id) }}</p>
                            </div>
                        </div>
                    </div>

                    @endforeach @endif
                </div>
            </div>
        </div>
    </section>
    <!-- best-sellers-area-end -->
</main>
<!-- main-area-end -->

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body"></div>
        </div>
    </div>
</div>

@push('frontend-scripts')
<script>
    $(".specialproduct").append('<div class="dec qtybutton">-</div><div class="inc qtybutton">+</div>');
    $(".qtybutton").on("click", function () {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;

            $button.parent().find("input").val(newVal);
            if(newVal>0){
                $productid = $button.parent().find("input").attr("id");
                @php
                    if(Auth::check()){
                @endphp
                    $.ajax({
                            type:'POST',
                            url:'{{ route("cart.add-to-cart-by-ajax") }}',
                            data:{productid:$productid, qty:newVal, _token: '{{csrf_token()}}'},
                            success:function(result){
                                    $("#divToReload_WithDAta").load(location.href + " #divToReload_WithDAta");
                                    $(".modal-body").html(result+' Items Added To Cart Successfully.');
                                    $("#myModal").modal('show');
                                    var myInterval = setInterval(function() {
                                    $("#myModal").modal('hide');
                                    }, 3000);
                                    return false;
                            }
                    });
                @php
                }else{
                @endphp
                    window.location.href = "{{ route('login')}}";
                @php
                }
                @endphp
            }
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
                $button.parent().find("input").val(newVal);
                if(newVal>0){
                    $productid = $button.parent().find("input").attr("id");
                    @php
                        if(Auth::check()){
                    @endphp

                        $.ajax({
                                type:'POST',
                                url:'{{ route("cart.add-to-cart-by-ajax") }}',
                                data:{productid:$productid, qty:newVal, _token: '{{csrf_token()}}'},
                                success:function(result){
                                        //alert(result); return false;
                                        $("#divToReload_WithDAta").load(location.href + " #divToReload_WithDAta");

                                        // $("#number_count_"+productid).val(qty);

                                        $(".modal-body").html(result+' Remove Item From Cart.');
                                        $("#myModal").modal('show');

                                        var myInterval = setInterval(function() {
                                        $("#myModal").modal('hide');

                                        }, 3000);


                                        return false;

                                }

                        });
                    @php
                    }else{
                    @endphp
                        window.location.href = "{{ route('login')}}";
                    @php
                    }
                    @endphp
                }
                if(newVal == 0){
                    $productid = $button.parent().find("input").attr("id");
                    @php
                        if(Auth::check()){
                    @endphp
                        $.ajax({
                                type:'POST',
                                url:'{{ route("cart.add-to-cart-by-ajax") }}',
                                data:{productid:$productid, qty:0, _token: '{{csrf_token()}}'},
                                success:function(result){
                                    $("#divToReload_WithDAta").load(location.href + " #divToReload_WithDAta");
                                    $(".modal-body").html(result+' Remove Item From Cart.');
                                    $("#myModal").modal('show');

                                    var myInterval = setInterval(function() {
                                    $("#myModal").modal('hide');

                                    }, 3000);

                                    return false;
                                }
                        });
                    @php
                    }else{
                    @endphp
                        window.location.href = "{{ route('login')}}";
                    @php
                    }
                    @endphp
                }
            } else {
                newVal = 0;
                $(".modal-body").html('Quantity should be at least one.');
                $("#myModal").modal('show');

                var myInterval = setInterval(function() {
                $("#myModal").modal('hide');

                }, 3000);

            }
        }


    });
</script>
@endpush @endsection
