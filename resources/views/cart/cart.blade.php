@extends('layouts.app')
@section('title', 'Salesanta | Shopping cart')
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
                                        {{-- <li class="breadcrumb-item"><a href="index.html">Pages</a></li>--}}
                                        <li class="breadcrumb-item active" aria-current="page">Shopping cart</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area-end -->

            <!-- cart-area -->
            <div class="cart-area pt-25 pb-15">

                {{-- <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6">
                                <h6>Delivery to : Biswajit Maity, 713216</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="col-xl-2">
                                <a href="#" class="btn btn-light" id="myBtn">Change</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                </section> --}}
                <div class="container">
                    <div class="row justify-content-center">

                            <div class="col-xl-12">
                                <form action="{{ route('update-cart') }}" name="updatecartitems" method="POST">
                                    @csrf
                                    <div class="cart-wrapper">
                                        <div class="table-responsive">
                                            @php
                                                $subtotal = 0;
                                            @endphp

                                            @if(count($cart) > 0)
                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-thumbnail">Image</th>
                                                            <th class="product-name">Product</th>
                                                            <th class="product-price">Price</th>
                                                            <th class="product-quantity">QUANTITY</th>
                                                            <th class="product-subtotal">SUBTOTAL</th>
                                                            <th class="product-delete"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                            @foreach ($cart as $row)
                                                            @php
                                                                $subtotal = $subtotal + ($row->price * $row->qty);
                                                            @endphp
                                                                <tr>
                                                                    <td class="product-thumbnail"><a href="{{ ViewProductDetails($row->product_id) }}"><img src="{{ $row->image }}" alt=""></a></td>
                                                                    <td class="product-name">
                                                                        <h4><a href="{{ ViewProductDetails($row->product_id) }}">{{ $row->name }}</a></h4>
                                                                    </td>
                                                                    <td class="product-price">&#8377; {{ $row->price }}</td>
                                                                    <td class="product-quantity">
                                                                        <div class="cart--plus--minus">
                                                                            {{-- <form action="#" class="num-block">
                                                                                <div class="num-block">
                                                                                    <input type="number" class="in-num" value="{{ $row->qty }}" readonly="">
                                                                                    <div class="qtybutton-box">
                                                                                        <span class="plus" onchange="Cartitemplus()"><i class="fas fa-angle-up"></i></span>
                                                                                        <span class="minus dis"><i class="fas fa-angle-down"></i></span>
                                                                                    </div>
                                                                                </div>
                                                                            </form> --}}
                                                                            <input type="hidden" name="rowid[]" value="{{ $row->id }}">
                                                                            <input type="number" id="quantity" name="quantity[]" min="1" max="99" value="{{ $row->qty }}">
                                                                        </div>
                                                                    </td>
                                                                    <td class="product-subtotal"><span>&#8377; {{ $row->price * $row->qty }}</span></td>
                                                                    <td class="product-delete"><a href="{{ route('remove-cart-item',['rowid='.Crypt::encryptString($row->id)]) }}"><i class="far fa-trash-alt"></i></a></td>
                                                                </tr>

                                                            @endforeach

                                                    </tbody>
                                                </table>
                                            @else
                                                <p class="text-center">Your Salesanta Cart is empty.</p>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="shop-cart-bottom ml-auto">
                                        <div class="cart-coupon">
                                            {{-- <form action="#">
                                                <input type="text" placeholder="Enter Coupon Code...">
                                                <button class="btn">Apply Coupon</button>
                                            </form> --}}
                                        </div>

                                        @if(count($cart) > 0)
                                        <div class="continue-shopping">
                                            <button type="submit" name="submit" class="btn">update Cart</button>
                                            <a href="{{ route('checkout')  }}" class="btn">PROCEED TO CHECKOUT</a>
                                        </div>
                                        @endif

                                    </div>





                                </form>
                            </div>





                    </div>
                </div>
            </div>
            <!-- cart-area-end -->

        </main>
        <!-- main-area-end -->

        @push('frontend-scripts')
        <script type="text/javascript">
            function Cartitemplus(){
                alert("here"); return false;
            }
        </script>
        @endpush('')


@endsection
