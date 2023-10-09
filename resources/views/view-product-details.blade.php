@extends('layouts.app')
@section('title', 'Salesanta | Product details page')
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
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item">
                                    <a
                                        href="{{ route('home.sub-cat-item-landing-page',['subcatitemname='.create_slug($subcategoryitem->sub_category_item_name).'&cid='.Crypt::encryptString($category->id).'&scid='.Crypt::encryptString($subcategory->id).'&sciid='.Crypt::encryptString($subcategoryitem->id)]) }}">
                                        {{ $subcategoryitem->sub_category_item_name }}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- shop-details-area -->
    <section class="shop-details-area pt-15 pb-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="shop-details-flex-wrap _78xt5Y">
                        <div class="shop-details-nav-wrap">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @if($productimage) @php $count = 1; @endphp @foreach ($productimage as $rowimagesmall => $imagevaluesmall) @if($imagevaluesmall->image_size == 'small')

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link @if($count == 1) active @endif" id="item-{{$count}}-tab" data-toggle="tab" href="#item-{{$count}}" role="tab" aria-controls="item-{{$count}}" aria-selected="true">
                                        <img src="{{ $imagevaluesmall->image_url }}" alt="" />
                                    </a>
                                </li>
                                @php $count++; @endphp @endif @endforeach @endif
                            </ul>
                        </div>
                        <div class="shop-details-img-wrap">
                            <div class="tab-content" id="myTabContent">
                                @if($productimage) @php $countone = 1; @endphp @foreach ($productimage as $rowimage => $imagevalue) @if($imagevalue->image_size == 'large')
                                <div class="tab-pane fade @if($countone == 1) show active @endif" id="item-{{$countone}}" role="tabpanel" aria-labelledby="item-{{$countone}}-tab">
                                    <div class="shop-details-img">
                                        <img src="{{ $imagevalue->image_url }}" alt="" />
                                    </div>
                                </div>
                                @php $countone++; @endphp @endif @endforeach @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shop-details-content">
                        <h4 class="title">{{ $product->name }}</h4>
                        <div class="shop-details-meta">
                            <ul>
                                <li>Brand : {{ GetProductBrand($product->brand) }} </li>
                                {{-- <li class="shop-details-review">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span>Review</span>
                                </li> --}}
                                <li>ID : <span>{{ $product->sku }}</span></li>
                            </ul>
                        </div>
                        <div class="shop-details-price">
                            <h2 class="price"><i class="fas fa-rupee-sign"></i>{{ number_format($product->sale_price,2) }}</h2>
                            <h5 class="stock-status">- IN Stock {{ $product->quantity }} Items</h5>
                        </div>
                        <div class="row pt-4 pb-4">
                            @if($variation) @foreach ($variation as $rowvariation) @if($rowvariation->id == $product->productwithvariation->variation_id)

                            <div class="col-6">
                                <p>{{ $rowvariation->variation_name }}</p>
                                <ul class="swatch-quantity">
                                    @if($variationitem) @foreach ($variationitem as $rowvariationitem) @if($rowvariationitem->id == $product->productwithvariationitem->variation_item_id)
                                    <li class="active"><a href="#">{{ $rowvariationitem->variation_item_name }}</a></li>
                                    @endif @endforeach @endif
                                </ul>
                            </div>

                            @endif @endforeach @endif
                        </div>

                        <div class="shop-details-list"><?php echo $product->highlights ?></div>

                        @if (Auth::user()) @php $countcartexistcheck = Checkuseralreadyaddedtocart(Auth::user()->id,$product->id); @endphp @if ($countcartexistcheck > 0)
                        <div class="shop-perched-info">
                            <a href="{{ route('cart') }}" class="btn">Go to cart</a>
                        </div>

                        @else
                        <div class="shop-perched-info">
                            <form action="{{ route('cart.add-to-cart') }}" name="addtocart" method="POST">
                                @csrf
                                <input type="hidden" name="productid" value="{{ $product->id  }}" />
                                <input type="hidden" name="qty" value="1" />
                                <button type="submit" name="addtocart" class="btn">add to cart</button> &nbsp;
                            </form>
                        </div>
                        @endif @else
                        <div class="shop-perched-info">
                            <form action="{{ route('cart.add-to-cart') }}" name="addtocart" method="POST">
                                @csrf
                                <input type="hidden" name="productid" value="{{ $product->id  }}" />
                                <input type="hidden" name="qty" value="1" />
                                <button type="submit" name="addtocart" class="btn">add to cart</button> &nbsp;
                            </form>
                            {{--
                            <form action="{{ route('cart.add-to-wishlist') }}" name="addtowishlist" method="POST">
                                <a href="#" class="btn"><i class="far fa-heart"></i></a>
                            </form>
                            --}}
                        </div>

                        @endif {{--
                        <div class="shop-details-bottom">
                            <ul>
                                <li><span>Tag : </span> <a href="#">ICE Cream</a></li>
                                <li>
                                    <span>CATEGORIES :</span>
                                    <a href="#">women's,</a>
                                    <a href="#">tops for,</a>
                                    <a href="#">large bust</a>
                                </li>
                            </ul>
                        </div>
                        --}}

                        <div class="shop-details-bottom spec_">
                            <h4>Specifications</h4>
                            @if($productatwithattribute)
                                @foreach ($productatwithattribute as $rowproductattribute)
                                    <h6>{{ Get_Attribute_Name($rowproductattribute->attribute_id) }}</h6>
                                    @if ($productatwithattributeitem)
                                        @foreach ($productatwithattributeitem as $rowproductatwithattributeitem)
                                            @if($rowproductatwithattributeitem->attribute_id == $rowproductattribute->attribute_id)

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p>{{ Get_attribute_item_name($rowproductatwithattributeitem->attribute_item_id) }}</p>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>
                                                        {{ $rowproductatwithattributeitem->attribute_item_value }}
                                                    </p>
                                                </div>
                                            </div>

                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                             @endif

                            <h6>Description</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Description</p>
                                </div>
                                <div class="col-md-8"><?php echo $product->description ?></div>
                            </div>

                            {{--
                            <h6>Ratings & Reviews</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Description</p>
                                </div>
                                <div class="col-md-8"><?php echo $product->description ?></div>
                            </div>
                            --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-details-area-end -->

    <!-- coupon-area -->
    {{--
    <div class="coupon-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="coupon-bg">
                        <div class="coupon-title">
                            <span>Use coupon Code</span>
                            <h3 class="title">Get <i class="fas fa-rupee-sign"></i>3 Discount Code</h3>
                        </div>
                        <div class="coupon-code-wrap">
                            <h5 class="code">ganic21abs</h5>
                            <img src="img/images/coupon_code.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    --}}
    <!-- coupon-area-end -->

    <!-- best-sellers-area -->
    <section class="best-sellers-area pt-25 pb-15">
        <div class="container">
            <div class="row align-items-end mb-40">
                <div class="col-md-8 col-sm-9">
                    <div class="section-title">
                        <span class="sub-title">Related Products</span>
                        <h2 class="title">From this Collection</h2>
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

                    @if ($rendomproduct) @foreach ($rendomproduct as $rowrandproduct)
                    <div class="col-3">
                        <div class="sp-product-item mb-20">
                            <div class="sp-product-thumb">
                                <span class="batch">New</span>
                                <a href={{ url('/view-product-details?pid='.Crypt::encryptString($rowrandproduct->id).'&cid='.Crypt::encryptString($rowrandproduct->category_id).'&scid='.Crypt::encryptString($rowrandproduct->sub_category_id).'&scitemid='.Crypt::encryptString($rowrandproduct->sub_category_item_id)) }}">
                                    <img src="{{ $rowrandproduct->productimage->image_url }}" alt="" />
                                </a>
                            </div>
                            <div class="sp-product-content">
                                {{-- <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div> --}}
                                <h6 class="title"><a href="{{ url('/view-product-details?pid='.Crypt::encryptString($rowrandproduct->id).'&cid='.Crypt::encryptString($rowrandproduct->category_id).'&scid='.Crypt::encryptString($rowrandproduct->sub_category_id).'&scitemid='.Crypt::encryptString($rowrandproduct->sub_category_item_id)) }}">{{ $rowrandproduct->name }}</a></h6>
                                <span class="product-status">IN Stock</span>
                                <div class="sp-cart-wrap">
                                    {{-- <form action="#">
                                        <div class="cart-plus-minus">
                                            <input type="text" value="1" />
                                        </div>
                                    </form> --}}
                                    <div class="cart-plus-minus specialproduct">
                                        @if(Auth::check())
                                        <input type="text" value="{{ GetCartCount($rowrandproduct->id) }}" id="{{$rowrandproduct->id}}" />
                                        @else
                                        <input type="text" value="0" id="{{$rowrandproduct->id}}" />
                                        @endif
                                    </div>
                                </div>
                                <p><i class="fas fa-rupee-sign"></i>{{ number_format($rowrandproduct->sale_price,2) }} - {{ Get_Variation_item_Name($rowrandproduct->Productwithvariationitem->variation_item_id) }}</p>
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
@endpush
@endsection
