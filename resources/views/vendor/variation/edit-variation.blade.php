<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.bootstrapdash.com/demo/plus/jquery/template/demo_1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Aug 2022 10:53:43 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Variation</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="http://localhost:8000/adminpanel/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="http://localhost:8000/adminpanel/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="http://localhost:8000/adminpanel/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->

    <link rel="stylesheet" href="http://localhost:8000/adminpanel/assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="http://localhost:8000/adminpanel/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="http://localhost:8000/adminpanel/assets/vendors/jquery-bar-rating/css-stars.css">
    <link rel="stylesheet" href="http://localhost:8000/adminpanel/assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="http://localhost:8000/adminpanel/assets/css/demo_1/style.css">
    <!-- End layout styles -->

    <link rel="shortcut icon" type="image/x-icon" href="http://localhost:8000/adminpanel/assets/images/favicon.ico">

    <link rel="stylesheet" href="http://localhost:8000/adminpanel/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">


</head>
<body>

    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              {{-- <h4 class="card-title">Complete form validation</h4> --}}

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



              <form class="cmxform" id="editvariation" method="post" action="{{ route('vendor.edit-variation-post') }}" name="editvariation">
                @csrf
                <input type="hidden" name="variationid" value="{{ $variation->id }}">
                <fieldset>

                    <div class="form-group">
                        <label for="category_id">Category Name</label>
                        <select name="category_id" class="js-example-basic-single" style="width:100%">
                            <option value="">Select Category</option>
                            @if($category)
                                @foreach ($category as $rowcategory)
                                    <option value="{{ $rowcategory->id }}" @if($rowcategory->id == $variation->category_id) selected="selected" @endif>{{ $rowcategory->category_name }}</option>
                                @endforeach
                            @endif
                        </select>
                      </div>


                      <div class="form-group">
                        <label for="sub_category_id">Sub Category</label>
                        <select name="sub_category_id" class="subcategory" style="width:100%;">
                            <option value="">Select Sub Category</option>
                            @php $getcatid = GetSubcategoryBycatid($variation->category_id); @endphp
                            @foreach($getcatid as $rowsubcat)
                            <option value="{{ $rowsubcat->id }}" @if($rowsubcat->id == $variation->sub_category_id) selected="selected" @endif>{{ $rowsubcat->sub_category_name }}</option>
                            @endforeach

                        </select>
                      </div>

                      <div class="form-group">
                        <label for="sub_category_item_id">Sub Category Item</label>
                        <select name="sub_category_item_id" class="subcategory" style="width:100%;">
                            <option value="">Select Sub Category</option>
                            @php $getsubcatitemid = GetSubcategoryitemBysubcatid($variation->sub_category_id); @endphp
                            @foreach($getsubcatitemid as $rowsubcatitem)
                            <option value="{{ $rowsubcatitem->id }}" @if($rowsubcatitem->id == $variation->sub_category_item_id) selected="selected" @endif>{{ $rowsubcatitem->sub_category_item_name }}</option>
                            @endforeach
                        </select>
                      </div>


                      <div class="form-group">
                        <label for="variation_name">Variation Name </label>
                        <input id="variation_name" class="form-control" name="variation_name" type="text"  value="{{ $variation->variation_name }}">
                      </div>


                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="status" id="status1" value="1" @if($variation->status == 1) checked @endif> Active </label>
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="status" id="status2" value="2" @if($variation->status == 2) checked @endif> InActive </label>
                          </div>
                        </div>
                      </div>


                  <input class="btn btn-primary btn-lg" type="submit" value="Submit">
                </fieldset>
              </form>
            </div>
          </div>
        </div>
    </div>




  <!-- plugins:js -->
  <script src="http://localhost:8000/adminpanel/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <script src="http://localhost:8000/adminpanel/assets/vendors/jquery-validation/jquery.validate.min.js"></script>
  <script src="http://localhost:8000/adminpanel/assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>



  <!-- Plugin js for this page -->
  <script src="http://localhost:8000/adminpanel/assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
  <script src="http://localhost:8000/adminpanel/assets/vendors/chart.js/Chart.min.js"></script>
  <script src="http://localhost:8000/adminpanel/assets/vendors/flot/jquery.flot.js"></script>
  <script src="http://localhost:8000/adminpanel/assets/vendors/flot/jquery.flot.resize.js"></script>
  <script src="http://localhost:8000/adminpanel/assets/vendors/flot/jquery.flot.categories.js"></script>
  <script src="http://localhost:8000/adminpanel/assets/vendors/flot/jquery.flot.fillbetween.js"></script>
  <script src="http://localhost:8000/adminpanel/assets/vendors/flot/jquery.flot.stack.js"></script>
  <script src="http://localhost:8000/adminpanel/assets/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="http://localhost:8000/adminpanel/assets/js/off-canvas.js"></script>
  <script src="http://localhost:8000/adminpanel/assets/js/hoverable-collapse.js"></script>
  <script src="http://localhost:8000/adminpanel/assets/js/misc.js"></script>
  <script src="http://localhost:8000/adminpanel/assets/js/settings.js"></script>
  <script src="http://localhost:8000/adminpanel/assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="http://localhost:8000/adminpanel/assets/js/dashboard.js"></script>
  <!-- End custom js for this page -->
  <script src="http://localhost:8000/adminpanel/assets/js/data-table.js"></script>

  <!-- Plugin js for this page -->
  <script src="http://localhost:8000/adminpanel/assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="http://localhost:8000/adminpanel/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page -->

  <!-- Custom js for this page -->

  <script src="http://localhost:8000/adminpanel/assets/js/bt-maxLength.js"></script>

  <script src="http://localhost:8000/adminpanel/assets/vendors/select2/select2.min.js"></script>
  <script src="http://localhost:8000/adminpanel/assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>

  <script src="http://localhost:8000/adminpanel/assets/js/typeahead.js"></script>
  <script src="http://localhost:8000/adminpanel/assets/js/select2.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(".alert").delay(2000).slideUp(200, function () {
            $(this).alert('close');
        });

        $(function() {
            // validate signup form on keyup and submit
            $("#editvariation").validate({
                rules: {
                    category_id: "required",
                    sub_category_id: "required",
                    sub_category_item_id : "required",
                    variation_name : "required",
                },
                messages: {
                    category_id: "Please select category",
                    sub_category_id: "Please select sub category",
                    sub_category_item_id: "Please select sub category item",
                    variation_name: "Please enter attribute category name",
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
        });
    </script>
</body>

</html>
