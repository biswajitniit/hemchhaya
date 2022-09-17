@extends('layouts.app')
@section('title', 'Salesanta | Category wise landing page')
@section('content')



<!-- main-area -->
<main>
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">Shop By {{ $category->category_name }} </h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Shop By {{ $category->category_name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->



    <!-- services-area -->
    <section class="services-area services-bg">
        <div class="container">
            <div class="container-inner-wrap">
                <div class="row justify-content-center">

                    @if ($subcategory)
                        @foreach ($subcategory as $row)
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                                <div class="services-item">
                                    <div class="content">
                                        <h5><a href="{{ route('home.sub-category-wise-page',['subcatname='.create_slug($row->sub_category_name).'&subcatid='.Crypt::encryptString($row->id)]) }}"> {{$row->sub_category_name }}</a></h5>
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




</main>
<!-- main-area-end -->






@push('frontend-scripts')

@endpush

@endsection
