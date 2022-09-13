@extends('layouts.vendor')
@section('title', 'Variationitems search category / subcategory / subcategory item wise')
@section('content')


<div class="main-panel">
    <div class="content-wrapper pb-0">
        <div class="page-header">
            <h3 class="page-title">Search variation items</h3>
            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                <button type="button" onclick="location.href='{{ route('vendor.add-variationitem') }}'" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                  <i class="mdi mdi-plus-circle"></i> Add Variation Items </button>
            </div>
        </div>

        <!-- first row starts here -->
        <div class="row">
            <div class="col-xl-12 stretch-card grid-margin">
                <div class="card">
                    <form action="{{ route('vendor.searchvariationitemlist') }}" name="searchvariationitemlist" id="searchvariationitemlist" method="GET">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <select name="category" class="category" style="width: 100%;">
                                            <option value="">Select Category</option>
                                            @if($category) @foreach ($category as $rowcategory)
                                            <option value="{{ Crypt::encryptString($rowcategory->id) }}">{{ $rowcategory->category_name }}</option>
                                            @endforeach @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <select name="subcategory" class="subcategory" style="width: 100%;">
                                            <option value="">Select Sub Category</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <select name="subcategoryitem" class="subcategoryitem" style="width: 100%;">
                                            <option value="">Select Sub Category Item</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <select name="variation" class="variation" style="width: 100%;">
                                            <option value="">Select Variation</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <input class="btn btn-primary btn-lg" type="submit" value="Search" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
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
        $("#searchvariationitemlist").validate({
            rules: {
                category: "required",
                subcategory: "required",
                subcategoryitem : "required",
				variation : "required",
            },
            messages: {
                category: "Please select category",
                subcategory: "Please select sub category",
                subcategoryitem: "Please select sub category item",
				variation: "Please select variation",
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
            if ($(".category").length) {
                $(".category").select2();
            }
            if ($(".subcategory").length) {
                $(".subcategory").select2();
            }
            if ($(".subcategoryitem").length) {
                $(".subcategoryitem").select2();
            }
            if ($(".variation").length) {
                $(".variation").select2();
            }
    })(jQuery);

    $("document").ready(function () {
        $('select[name="category"]').on('change', function () {
            var catId = $(this).val();
            if (catId) {
                $.ajax({
                    url: "{{route('vendor.getsubcategory')}}",
                    type: "POST",
                    data:{categoryid:catId, _token: '{{csrf_token()}}'},
                    dataType: "json",
                    success: function (returndata) {
                        $('select[name="subcategory"]').empty();
                        $.each(returndata, function (key, value) {
                            $('select[name="subcategory"]').append('<option value=\'' +value.id+'\'>' + value.text + '</option>');
                        })
                    }
                })
            } else {
                $('select[name="subcategory"]').empty();
            }
        });

        $('select[name="subcategory"]').on('change', function () {
            var subcatId = $(this).val();
            if (subcatId) {
                $.ajax({
                    url: "{{route('vendor.getsubcategoryitem')}}",
                    type: "POST",
                    data:{subcategoryid:subcatId, _token: '{{csrf_token()}}'},
                    dataType: "json",
                    success: function (returndata) {
                        $('select[name="subcategoryitem"]').empty();
                        $.each(returndata, function (key, value) {
                            $('select[name="subcategoryitem"]').append('<option value=\'' +value.id+'\'>' + value.text + '</option>');
                        })
                    }
                })
            } else {
                $('select[name="subcategoryitem"]').empty();
            }
        });

        $('select[name="subcategoryitem"]').on('change', function () {
            var subcatitemId = $(this).val();
            //alert(subcatitemId); return false;
            if (subcatitemId) {
                $.ajax({
                    url: "{{route('vendor.getvariation')}}",
                    type: "POST",
                    data:{subcategoryitemid:subcatitemId, _token: '{{csrf_token()}}'},
                    dataType: "json",
                    success: function (returndata) {
                        $('select[name="variation"]').empty();
                        $.each(returndata, function (key, value) {
                            $('select[name="variation"]').append('<option value=\'' +value.id+'\'>' + value.text + '</option>');
                        })
                    }
                })
            } else {
                $('select[name="variation"]').empty();
            }
        });

    });
</script>
@endpush
@endsection
