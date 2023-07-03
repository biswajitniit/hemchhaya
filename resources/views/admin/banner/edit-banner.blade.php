@extends('layouts.admin') @section('title', 'Edit Banner') @section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Edit Category</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.banner') }}">Banners</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Banner</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        {{--
                        <h4 class="card-title">Complete form validation</h4>
                        --}} @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                        @endif

                        <form class="cmxform" id="editbanner" method="post" action="{{ route('admin.edit-banner-post') }}" name="editbanner" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="bannerid" value="{{ $banner->id }}}" />
                            <input type="hidden" name="bannerimageurl" value="{{ $banner->banner_image }}" />
                            <fieldset>
                                <div class="form-group">
                                    <label for="banner_order">Banner Order <span class="required">*</span></label>
                                    <input id="banner_order" class="form-control" name="banner_order" type="text" value="{{ $banner->banner_order }}"/>
                                </div>

                                <div class="form-group">
                                    <label for="banner_text_top">Banner Text Top <span class="required">*</span></label>
                                    <input id="banner_text_top" class="form-control" name="banner_text_top" type="text" value="{{ $banner->banner_text_top }}"/>
                                </div>

                                <div class="form-group">
                                    <label for="banner_text_middle">Banner Text Middle <span class="required">*</span></label>
                                    <input id="banner_text_middle" class="form-control" name="banner_text_middle" type="text" value="{{ $banner->banner_text_middle }}"/>
                                </div>

                                <div class="form-group">
                                    <label for="banner_text_buttom">Banner Text Buttom <span class="required">*</span></label>
                                    <input id="banner_text_buttom" class="form-control" name="banner_text_buttom" type="text" value="{{ $banner->banner_text_buttom }}"/>
                                </div>

                                <div class="form-group">
                                    <label for="banner_url">Banner URL <span class="required">*</span></label>
                                    <input id="banner_url" class="form-control" name="banner_url" type="text" value="{{ $banner->banner_url }}"/>
                                </div>

                                <div class="form-group">
                                    <label for="image">Banner Image <span class="required">*</span></label>
                                    <input id="image" class="form-control" name="image" type="file" />
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label"> <input type="radio" class="form-check-input" name="status" id="status1" value="1" @if($banner->status == 1) checked @endif> Active </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                            <label class="form-check-label"> <input type="radio" class="form-check-input" name="status" id="status2" value="2" @if($banner->status == 2) checked @endif> InActive </label>
                                        </div>
                                    </div>
                                </div>
                                <input class="btn btn-primary" type="submit" value="Submit" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © {{ date('Y') }} <a href="{{ url('/') }}" target="_blank">Hemchhaya</a>. All rights reserved.</span>
        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->

@push('scripts')
<script type="text/javascript">
    $(".alert")
        .delay(2000)
        .slideUp(200, function () {
            $(this).alert("close");
        });

    $(function () {
        // validate signup form on keyup and submit
        $("#editbanner").validate({
            rules: {
                banner_order: "required",
                banner_text_top: "required",
                banner_text_middle: "required",
                banner_text_buttom: "required",
                banner_url: "required"
            },
            messages: {
                banner_order: "Please enter banner order",
                banner_text_top: "Please enter banner top text",
                banner_text_middle: "Please enter banner middle text",
                banner_text_buttom: "Please enter banner buttom text",
                banner_url: "Please enter banner url"
            },
            errorPlacement: function (label, element) {
                label.addClass("mt-2 text-danger");
                label.insertAfter(element);
            },
            highlight: function (element, errorClass) {
                $(element).parent().addClass("has-danger");
                $(element).addClass("form-control-danger");
            },
        });
    });
</script>
@endpush @endsection
