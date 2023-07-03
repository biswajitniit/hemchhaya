@extends('layouts.app')
@section('title', 'Salesanta | Category wise landing page')
@section('content')


<main>
    <div class="container custom-container">
        <div class="slider-category-wrap">
            <div class="row category-active slick-initialized slick-slider">
                <div class="slick-list draggable">
                    <div class="slick-track" style="opacity: 1; width: 1128px; transform: translate3d(0px, 0px, 0px);">
                        <div class="row">

                            @if ($subcategoryitem)
                                @foreach ($subcategoryitem as $row)
                                    <div class="col-md-3 slick-slide slick-current slick-active pb-90" data-slick-index="0" aria-hidden="false" style="width: 188px;" tabindex="0">
                                        <div class="category-item active">
                                            <a href="{{ route('home.sub-cat-item-landing-page',['subcatitemname='.create_slug($row->sub_category_item_name).'&cid='.Crypt::encryptString($row->category_id).'&scid='.Crypt::encryptString($row->sub_category_id).'&sciid='.Crypt::encryptString($row->id)]) }}" class="category-link" tabindex="0"></a>
                                            <div class="category-thumb">
                                                <img src="{{$row->sub_category_item_image}}" alt="" />
                                            </div>
                                            <div class="category-content">
                                                <h6 class="title">{{$row->sub_category_item_name }}</h6>
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
    </div>
</main>
<!-- main-area-end -->

@push('frontend-scripts')

@endpush
@endsection
