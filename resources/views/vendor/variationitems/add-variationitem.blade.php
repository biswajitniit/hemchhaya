@extends('layouts.vendor')
@section('title', 'Add variation item')
@section('content')


<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Add variation items</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('variation-items') }}">variation items</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add variation items</li>
          </ol>
        </nav>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">


                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif



                <form class="cmxform" id="addvariationitem" method="post" action="{{ route('vendor.add-variationitem-post-data') }}" name="addvariationitem">
                    @csrf
                    <fieldset>

                        <div class="form-group">
                            <label for="category_id">Category Name <span class="required">*</span></label>
                            <select name="category_id" class="js-example-basic-single" style="width:100%">
                                <option value="">Select Category</option>
                                @if($category)
                                    @foreach ($category as $rowcategory)
                                        <option value="{{ $rowcategory->id }}">{{ $rowcategory->category_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="sub_category_id">Sub Category <span class="required">*</span></label>
                            <select name="sub_category_id" class="subcategory" style="width: 100%;">
                                <option value="">Select Sub Category</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sub_category_item_id">Sub Category Item <span class="required">*</span></label>
                            <select name="sub_category_item_id" class="subcategoryitem" style="width: 100%;">
                                <option value="">Select Sub Category</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="variation_id">Variation <span class="required">*</span></label>
                            <select name="variation_id" class="variation_id" style="width: 100%;">
                                <option value="">Select Variation</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="variation_item_name">Variation Item Name </label>
                            <input id="variation_item_name" class="form-control" name="variation_item_name" type="text">
                        </div>



                        <div class="col-lg-4 grid-margin grid-margin-lg-0">
                            <div class="card-body">
                              <h4 class="card-title">Color</h4>
                              <p class="card-description">Click to select color</p>
                              <input type='text' name="color" class="color-picker" value="" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label for="image" class="col-form-label">Image </label>
                                <input type="file" name="image" class="dropify"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status <span class="required">*</span></label>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label"> <input type="radio" class="form-check-input" name="status" id="status1" value="1" checked /> Active </label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <label class="form-check-label"> <input type="radio" class="form-check-input" name="status" id="status2" value="2" /> InActive </label>
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
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © {{ date('Y') }} <a href="{{ url('/') }}" target="_blank">Salesanta</a>. All rights reserved.</span>
        </div>
    </footer>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->





@push('scripts')
    <script type="text/javascript">
        $(".alert").delay(2000).slideUp(200, function () {
            $(this).alert('close');
        });

        $(function() {
            // validate signup form on keyup and submit
            $("#addvariationitem").validate({
                rules: {
                    category_id: "required",
                    sub_category_id: "required",
                    sub_category_item_name : "required",
                    variation_id : "required",
                    variation_name : "required",
                },
                messages: {
                    category_id: "Please select category",
                    sub_category_id: "Please select sub category",
                    sub_category_item_name: "Please enter sub category item name",
                    variation_id: "Please select variation",
                    variation_name: "Please enter variation name",
                },
                errorPlacement: function(label, element) {
                    label.addClass('mt-2 text-danger');
                    label.insertAfter(element);
                },
                highlight: function(element, errorClass) {
                    $(element).parent().addClass('has-danger')
                    $(element).addClass('form-control-danger')
                }
            });
        });

        (function($) {
            if ($(".subcategory").length) {
                $(".subcategory").select2();
            }
            if ($(".subcategoryitem").length) {
                $(".subcategoryitem").select2();
            }
            if ($(".variation_id").length) {
                $(".variation_id").select2();
            }
        })(jQuery);


        $("document").ready(function () {
            $('select[name="category_id"]').on('change', function () {
                var catId = $(this).val();
                if (catId) {
                    $.ajax({
                        url: "{{route('vendor.getsubcategorycpt')}}",
                        type: "POST",
                        data:{categoryid:catId, _token: '{{csrf_token()}}'},
                        dataType: "json",
                        success: function (returndata) {
                            $('select[name="sub_category_id"]').empty();
                            $.each(returndata, function (key, value) {
                                $('select[name="sub_category_id"]').append('<option value=\'' +value.id+'\'>' + value.text + '</option>');
                            })
                        }
                    })
                } else {
                    $('select[name="sub_category_id"]').empty();
                }
            });

            $('select[name="sub_category_id"]').on('change', function () {
                var subcatId = $(this).val();
                if (subcatId) {
                    $.ajax({
                        url: "{{route('vendor.getsubcategoryitemcpt')}}",
                        type: "POST",
                        data:{subcategoryid:subcatId, _token: '{{csrf_token()}}'},
                        dataType: "json",
                        success: function (returndata) {
                            $('select[name="sub_category_item_id"]').empty();
                            $.each(returndata, function (key, value) {
                                $('select[name="sub_category_item_id"]').append('<option value=\'' +value.id+'\'>' + value.text + '</option>');
                            })
                        }
                    })
                } else {
                    $('select[name="sub_category_item_id"]').empty();
                }
            });

            $('select[name="sub_category_item_id"]').on('change', function () {
                var subcatitemId = $(this).val();
                //alert(subcatitemId); return false;
                if (subcatitemId) {
                    $.ajax({
                        url: "{{route('vendor.getvariationBysubcategoryitem')}}",
                        type: "POST",
                        data:{subcategoryitemid:subcatitemId, _token: '{{csrf_token()}}'},
                        dataType: "json",
                        success: function (returndata) {
                            $('select[name="variation_id"]').empty();
                            $.each(returndata, function (key, value) {
                                $('select[name="variation_id"]').append('<option value=\'' +value.id+'\'>' + value.text + '</option>');
                            })
                        }
                    })
                } else {
                    $('select[name="variation_id"]').empty();
                }
            });

        });

    </script>
@endpush
@endsection
