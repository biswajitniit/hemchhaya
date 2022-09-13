@extends('layouts.vendor')
@section('title', 'Add products')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">Product</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Products</li>
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



              <form class="cmxform" id="addproduct" method="post" action="{{ route('vendor.add-product-post-data') }}" name="addproduct" enctype="multipart/form-data">
                @csrf
                <fieldset>

                    <h3>Categories</h3>
                    <hr />

                        <div class="form-group row">
                            <label for="category_id" class="col-sm-3 col-form-label">Category name <span class="required">*</span></label>
                            <div class="col-sm-6">
                                <select name="category_id" class="category_id" style="width:100%">
                                    <option value="">Select category</option>
                                    @if($category)
                                        @foreach ($category as $rowcategory)
                                            <option value="{{ $rowcategory->id }}" @if(request()->catid == $rowcategory->id) selected @endif>{{ $rowcategory->category_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sub_category_id" class="col-sm-3 col-form-label">Sub category <span class="required">*</span></label>
                            <div class="col-sm-6">
                                <select name="sub_category_id" class="subcategory" style="width: 100%;">
                                    <option value="">Select sub category</option>
                                    @if(request()->subcatid)
                                        @php
                                        $getsubcategorylistbycategory = GetSubcategoryBycatid(request()->catid);
                                        @endphp
                                        @foreach ($getsubcategorylistbycategory as $rowsubcategory)
                                            <option value="{{ $rowsubcategory->id }}" @if($rowsubcategory->id == request()->subcatid) selected @endif>{{ $rowsubcategory->sub_category_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sub_category_item_id" class="col-sm-3 col-form-label">Sub category item <span class="required">*</span></label>
                            <div class="col-sm-6">
                                <select name="sub_category_item_id" class="subcategoryitem" style="width: 100%;">
                                    <option value="">Select sub category item</option>
                                    @if(request()->subcatitemid)
                                        @php
                                        $getsubcategoryitemlistbycategory = GetSubcategoryitemBysubcatid(request()->subcatid);
                                        @endphp
                                        @foreach ($getsubcategoryitemlistbycategory as $rowsubcategoryitem)
                                            <option value="{{ $rowsubcategoryitem->id }}" @if($rowsubcategoryitem->id == request()->subcatitemid) selected @endif>{{ $rowsubcategoryitem->sub_category_item_name }}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                        </div>

                    <hr />
                    <h3>Description</h3>
                    <hr />
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name <span class="required">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control" id="name" placeholder="" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brand" class="col-sm-3 col-form-label">Brand <span class="required">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" name="brand" class="form-control" id="brand" placeholder="" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="highlights" class="col-sm-3 col-form-label">Highlights <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="highlights" id="highlights-ckeditor" rows="10" cols="80"/></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Description <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="description" id="description-ckeditor" rows="10" cols="80"/></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Is featured?</label>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="is_featured" id="is_featured1" value="1" > Yes </label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="is_featured" id="is_featured2" value="2" checked> No </label>
                                </div>
                            </div>
                        </div>

                      <hr />
                      <h6>Manufacturing Details</h6>
                      <hr />
                        <div class="form-group row">
                            <label for="country_of_origin" class="col-sm-3 col-form-label">Country of Origin <span class="required">*</span></label>
                            <div class="col-sm-6">
                                <select name="country_of_origin" class="country_of_origin" style="width: 100%;">
                                    <option value="">Select Country</option>
                                    <option value="INDIA">INDIA</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="manufacture_details" class="col-sm-3 col-form-label">Manufacture Details <span class="required">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" name="manufacture_details" class="form-control" id="manufacture_details" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="packer_details" class="col-sm-3 col-form-label">Packer Details <span class="required">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" name="packer_details" class="form-control" id="packer_details" placeholder="" />
                            </div>
                        </div>

                    <hr />
                    <h3>Product has variations</h3>
                    <hr />

                        @if (!empty(request()->catid) &&  !empty(request()->subcatid) && !empty(request()->subcatitemid))
                        @php
                        $getVariation = GetVariationlistonaddproduct(request()->catid,request()->subcatid,request()->subcatitemid);
                        @endphp

                        @if($getVariation)
                            <div class="form-group row">
                                @foreach ($getVariation as $rowvariation)
                                    <div class="col-sm-6">
                                        <label for="variation" class="col-form-label"> {{ $rowvariation->variation_name }}</label>
                                        <select name="variation[]" class="variation" style="width: 100%;">
                                        <option value="">Select One</option>
                                        @php
                                            $getVariationitem = GetVariationitemlistonaddproduct(request()->catid,request()->subcatid,request()->subcatitemid,$rowvariation->id);
                                            @endphp
                                            @if($getVariationitem)
                                                @foreach ($getVariationitem as $rowvariationitem)
                                                    <option value="{{ $rowvariationitem->id }}">{{ $rowvariationitem->variation_item_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endif

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="front_view_image" class="col-form-label">Front View Image <span class="required">*</span></label>
                            <input type="file" name="front_view_image" class="dropify" />
                        </div>
                        <div class="col-sm-3">
                            <label for="back_view_image" class="col-form-label">Back View Image </label>
                            <input type="file" name="back_view_image" class="dropify" />
                        </div>
                        <div class="col-sm-3">
                            <label for="side_view_image" class="col-form-label">Side View Image </label>
                            <input type="file" name="side_view_image" class="dropify" />
                        </div>
                        <div class="col-sm-3">
                            <label for="open_view_image" class="col-form-label">Open View Image </label>
                            <input type="file" name="open_view_image" class="dropify" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="sku" class="col-form-label">SKU <span class="required">*</span></label>
                            <input type="text" name="sku"  class="form-control" />
                        </div>
                        <div class="col-sm-3">
                            <label for="price" class="col-form-label">Price <span class="required">*</span></label>
                            <input type="text" name="price"  class="form-control" />
                        </div>
                        <div class="col-sm-3">
                            <label for="sale_price" class="col-form-label">Your Selling Price <span class="required">*</span></label>
                            <input type="text" name="sale_price"  class="form-control" />
                        </div>
                        <div class="col-sm-3">
                            <label for="quantity" class="col-form-label">Quantity <span class="required">*</span></label>
                            <input type="text" name="quantity"  class="form-control" />
                        </div>
                    </div>

                    <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                        <input type="checkbox" name="allow_customer_checkout_when_this_product_out_of_stock" value="1" class="form-check-input"> Allow customer checkout when this product out of stock <i class="input-helper"></i> </label>
                    </div>

                <hr />
                <h6>Packaging Details</h6>
                <hr />

                <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="weight" class="col-form-label">Packaging Weight (Kg) <span class="required">*</span></label>
                                <input type="text" name="weight"  class="form-control" />
                            </div>
                            <div class="col-sm-6">
                                <label for="length" class="col-form-label">Packaging Length (cm) <span class="required">*</span></label>
                                <input type="text" name="length"  class="form-control" />
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="breadth" class="col-form-label">Packaging Breadth (cm) <span class="required">*</span></label>
                                <input type="text" name="breadth"  class="form-control" />
                            </div>
                            <div class="col-sm-6">
                                <label for="height" class="col-form-label">Packaging Height (cm) <span class="required">*</span></label>
                                <input type="text" name="height"  class="form-control" />
                            </div>
                        </div>



                        @if (!empty(request()->catid) &&  !empty(request()->subcatid) && !empty(request()->subcatitemid))
                            @php
                                $getattributecategory = Getattributecategory(request()->catid,request()->subcatid,request()->subcatitemid);
                            @endphp
                            @if($getattributecategory)
                                @foreach ($getattributecategory as $rowattributecat)

                                <h6>{{ $rowattributecat->attribute_category_name }}</h6>
                                <hr />


                                        @php
                                        $getattribute = Getattributebyattributecategory($rowattributecat->id);
                                        @endphp
                                        @if($getattribute)
                                            @foreach ($getattribute as $rowattribute)

                                                @if($rowattribute->column_type == 1)
                                                    <!-- For TextBox -->
                                                    <div class="form-group row">
                                                        <label for="{{ $rowattribute->column_slug }}" class="col-sm-3 col-form-label">{{ $rowattribute->column_name }} @if($rowattribute->column_validation == 2) <span class="required">*</span> @endif</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="{{ $rowattribute->column_slug }}" class="form-control" id="{{ $rowattribute->column_slug }}" placeholder="" @if($rowattribute->column_validation == 2) required @endif/>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if($rowattribute->column_type == 2)
                                                    <!-- For TextBox Password-->
                                                    <div class="form-group row">
                                                        <label for="{{ $rowattribute->column_slug }}" class="col-sm-3 col-form-label">{{ $rowattribute->column_name }} @if($rowattribute->column_validation == 2) <span class="required">*</span> @endif</label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="{{ $rowattribute->column_slug }}" placeholder="" @if($rowattribute->column_validation == 2) required @endif/>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if($rowattribute->column_type == 3)
                                                <!-- For TextBox Email-->
                                                <div class="form-group row">
                                                    <label for="{{ $rowattribute->column_slug }}" class="col-sm-3 col-form-label">{{ $rowattribute->column_name }} @if($rowattribute->column_validation == 2) <span class="required">*</span> @endif</label>
                                                    <div class="col-sm-6">
                                                        <input type="email" class="form-control" id="{{ $rowattribute->column_slug }}" placeholder="" @if($rowattribute->column_validation == 2) required @endif/>
                                                    </div>
                                                </div>
                                                @endif

                                                @if($rowattribute->column_type == 4)
                                                <!-- For TextBox Dropdown-->
                                                <div class="form-group row">
                                                    <label for="{{ $rowattribute->column_slug }}" class="col-sm-3 col-form-label">{{ $rowattribute->column_name }} @if($rowattribute->column_validation == 2) <span class="required">*</span> @endif</label>
                                                    <div class="col-sm-6">
                                                        <select name="{{ $rowattribute->column_slug }}" id="{{ $rowattribute->column_slug }}"  style="width: 100%;" @if($rowattribute->column_validation == 2) required @endif>
                                                            <option value="">Select Column Validation</option>
                                                            <option value="1">Optional</option>
                                                            <option value="2">Required</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                @endif

                                                @if($rowattribute->column_type == 5)
                                                <!-- For Tags-->
                                                <div class="form-group row">
                                                    <label for="{{ $rowattribute->column_slug }}" class="col-sm-3 col-form-label">{{ $rowattribute->column_name }} @if($rowattribute->column_validation == 2) <span class="required">*</span> @endif</label>
                                                    <div class="col-sm-6">
                                                        {{-- <input name="{{ $rowattribute->column_slug }}" id="tags" value="{{ $rowattribute->tags }}" /> --}}
                                                        @php
                                                        $tags = explode(",", $rowattribute->tags);
                                                        @endphp
                                                        <select id="ice-cream" name="ice-cream" multiple>
                                                            @foreach ($tags as $rowtags)
                                                            <option value="{{ $rowtags }}">{{ $rowtags }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                                @endif

                                                @if($rowattribute->column_type == 6)
                                                <!-- For Tags-->
                                                <div class="form-group row">
                                                    <label for="{{ $rowattribute->column_slug }}" class="col-sm-3 col-form-label">{{ $rowattribute->column_name }} @if($rowattribute->column_validation == 2) <span class="required">*</span> @endif</label>
                                                    <div class="col-sm-6">



                                                    </div>
                                                </div>
                                                @endif

                                            @endforeach
                                        @endif




                                @endforeach
                            @endif
                        @endif

                        <hr />
                        <h3>Search engine optimize</h3>
                        <hr />

                        <div class="form-group">
                            <label for="search_keywords">Search Keywords</label>
                            <input name="search_keywords" id="tags" value="" />
                        </div>
                        <div class="form-group">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" id="tags" value="" />
                        </div>
                        <div class="form-group">
                            <label for="meta_keywords">Meta Keywords</label>
                            <textarea class="form-control" id="meta_keywords" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea class="form-control" id="meta_description" rows="4"></textarea>
                        </div>


                  <input class="btn btn-primary btn-lg" type="submit" value="Submit">
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



     CKEDITOR.replace( 'highlights-ckeditor' );
     CKEDITOR.replace( 'description-ckeditor' );

        $(".alert").delay(2000).slideUp(200, function () {
            $(this).alert('close');
        });

        $(function() {
            $('#ice-cream').multiSelect();

            // validate signup form on keyup and submit
            $("#addproduct").validate({
                rules: {
                    category_id: "required",
                    sub_category_id: "required",
                    sub_category_item_name : "required",
                },
                messages: {
                    category_id: "Please select category",
                    sub_category_id: "Please select sub category",
                    sub_category_item_name: "Please enter sub category item name",
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
            if ($(".category_id").length) {
                $(".category_id").select2();
            }
            if ($(".subcategory").length) {
                $(".subcategory").select2();
            }
            if ($(".subcategoryitem").length) {
                $(".subcategoryitem").select2();
            }
            if ($(".procurement_type").length) {
                $(".procurement_type").select2();
            }
            if ($(".shipping_provider").length) {
                $(".shipping_provider").select2();
            }
            if ($(".gst_code").length) {
                $(".gst_code").select2();
            }
            if ($(".country_of_origin").length) {
                $(".country_of_origin").select2();
            }
            if ($(".variation").length) {
                $(".variation").select2();
            }


        })(jQuery);

        $("document").ready(function () {
            $('select[name="category_id"]').on('change', function () {
                var catId = $(this).val();
                if (catId) {
                    $.ajax({
                        url: "{{route('admin.get_sub_category_on_product_page')}}",
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
                        url: "{{route('admin.get_sub_category_item_on_product_page')}}",
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
                var catId = $(".category_id").val();
                var subcatId = $(".subcategory").val();
                var subcatitemId = $(this).val();

                location.href = '<?php echo url('/'); ?>/vendor/add-product?catid='+catId+'&subcatid='+subcatId+'&subcatitemid='+subcatitemId+'';
                // $.ajax({
                //     url: "{{route('admin.get_attributecat_with_attribute_on_product_page')}}",
                //     type: "POST",
                //     data:{categoryid:catId,subcategoryid:subcatId,subcategoryitemid:subcatitemId, _token: '{{csrf_token()}}'},
                //     dataType: "json",
                //     success: function (returndata) {

                //         //console.log(returndata); return false;
                //         $("#product_desc").html(returndata);

                //     }
                // });

            });

        });





    </script>
@endpush
@endsection
