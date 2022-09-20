<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.bootstrapdash.com/demo/plus/jquery/template/demo_1/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Aug 2022 10:53:43 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Variation item</title>
    <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/mdi/css/materialdesignicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/flag-icon-css/css/flag-icon.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/css/vendor.bundle.base.css')); ?>">
    <!-- endinject -->

    <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/select2/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>">

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/css-stars.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/font-awesome/css/font-awesome.min.css')); ?>">
    <!-- End plugin css for this page -->


      <!-- Plugin css for this page -->
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/dropzone/dropzone.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/font-awesome/css/font-awesome.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/bars-1to10.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/bars-horizontal.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/bars-movie.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/bars-pill.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/bars-reversed.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/bars-square.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/bootstrap-stars.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/css-stars.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/examples.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/fontawesome-stars-o.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/fontawesome-stars.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-asColorPicker/css/asColorPicker.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/x-editable/bootstrap-editable.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/dropify/dropify.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-file-upload/uploadfile.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/jquery-tags-input/jquery.tagsinput.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css')); ?>">

    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/css/demo_1/style.css')); ?>">
    <!-- End layout styles -->

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('adminpanel/assets/images/favicon.ico')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('adminpanel/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')); ?>">

</head>
<body>

    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if(session()->has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('message')); ?>

                    </div>
                <?php endif; ?>



              <form class="cmxform" id="editvariationitem" method="post" action="<?php echo e(route('vendor.edit-variationitem-post')); ?>" name="editvariationitem">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="variationitemid" value="<?php echo e($variationitem->id); ?>">
                <fieldset>

                    <div class="form-group">
                        <label for="category_id">Category Name</label>
                        <select name="category_id" class="js-example-basic-single" style="width:100%">
                            <option value="">Select Category</option>
                            <?php if($category): ?>
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($rowcategory->id); ?>" <?php if($rowcategory->id == $variationitem->category_id): ?> selected="selected" <?php endif; ?>><?php echo e($rowcategory->category_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                      </div>


                      <div class="form-group">
                        <label for="sub_category_id">Sub Category</label>
                        <select name="sub_category_id" class="subcategory" style="width:100%;">
                            <option value="">Select Sub Category</option>
                            <?php $getcatid = GetSubcategoryBycatid($variationitem->category_id); ?>
                            <?php $__currentLoopData = $getcatid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowsubcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($rowsubcat->id); ?>" <?php if($rowsubcat->id == $variationitem->sub_category_id): ?> selected="selected" <?php endif; ?>><?php echo e($rowsubcat->sub_category_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>
                      </div>

                      <div class="form-group">
                        <label for="sub_category_item_id">Sub Category Item</label>
                        <select name="sub_category_item_id" class="subcategory" style="width:100%;">
                            <option value="">Select Sub Category</option>
                            <?php $getsubcatitemid = GetSubcategoryitemBysubcatid($variationitem->sub_category_id); ?>
                            <?php $__currentLoopData = $getsubcatitemid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowsubcatitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($rowsubcatitem->id); ?>" <?php if($rowsubcatitem->id == $variationitem->sub_category_item_id): ?> selected="selected" <?php endif; ?>><?php echo e($rowsubcatitem->sub_category_item_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="variation_id">Variation <span class="required">*</span></label>
                        <select name="variation_id" class="variation_id" style="width: 100%;">
                            <option value="">Select Variation</option>

                            <?php
                            $getvariation = GetVariation($variationitem->sub_category_id);
                            ?>
                            <?php if($getvariation): ?> <?php $__currentLoopData = $getvariation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowvariation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($rowvariation->id); ?>" <?php if($rowvariation->id == $variationitem->variation_id): ?> selected <?php endif; ?>><?php echo e($rowvariation->variation_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="variation_item_name">Variation Item Name </label>
                        <input id="variation_item_name" class="form-control" name="variation_item_name" value="<?php echo e($variationitem->variation_item_name); ?>" type="text">
                    </div>

                    <div class="col-lg-4 grid-margin grid-margin-lg-0">
                        <div class="card-body">
                          <h4 class="card-title">Color</h4>
                          <p class="card-description">Click to select color</p>
                          <input type='text' name="color" class="color-picker" value="<?php echo e($variationitem->color); ?>" />
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="image" class="col-form-label">Image </label>
                            <input type="file" name="image" class="dropify"/>
                        </div>
                    </div>

                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="status" id="status1" value="1" <?php if($variationitem->status == 1): ?> checked <?php endif; ?>> Active </label>
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="status" id="status2" value="2" <?php if($variationitem->status == 2): ?> checked <?php endif; ?>> InActive </label>
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




    <script src="<?php echo e(asset('adminpanel/assets/vendors/js/vendor.bundle.base.js')); ?>"></script>
    <!-- endinject -->
    <script src="<?php echo e(asset('adminpanel/assets/vendors/jquery-validation/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/jquery-steps/jquery.steps.min.js')); ?>"></script>


    <!-- Plugin js for this page -->
    <script src="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/jquery.barrating.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/chart.js/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/flot/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/flot/jquery.flot.resize.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/flot/jquery.flot.categories.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/flot/jquery.flot.fillbetween.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/flot/jquery.flot.stack.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/js/jquery.cookie.js')); ?>" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo e(asset('adminpanel/assets/js/off-canvas.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/js/hoverable-collapse.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/js/misc.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/js/settings.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/js/todolist.js')); ?>"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?php echo e(asset('adminpanel/assets/js/dashboard.js')); ?>"></script>
    <!-- End custom js for this page -->
    <script src="<?php echo e(asset('adminpanel/assets/js/data-table.js')); ?>"></script>

    <!-- Plugin js for this page -->
    <script src="<?php echo e(asset('adminpanel/assets/vendors/datatables.net/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')); ?>"></script>
    <!-- End plugin js for this page -->

    <!-- Custom js for this page -->
    
    <script src="<?php echo e(asset('adminpanel/assets/js/bt-maxLength.js')); ?>"></script>

    <script src="<?php echo e(asset('adminpanel/assets/vendors/select2/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/vendors/typeahead.js/typeahead.bundle.min.js')); ?>"></script>

    <script src="<?php echo e(asset('adminpanel/assets/js/typeahead.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('adminpanel/assets/js/wizard.js')); ?>"></script>



        <!-- Plugin js for this page -->
        <script src="<?php echo e(asset('adminpanel/assets/vendors/jquery-bar-rating/jquery.barrating.min.js')); ?>"></script>
        <script src="<?php echo e(asset('adminpanel/assets/vendors/jquery-asColor/jquery-asColor.min.js')); ?>"></script>
        <script src="<?php echo e(asset('adminpanel/assets/vendors/jquery-asGradient/jquery-asGradient.min.js')); ?>"></script>
        <script src="<?php echo e(asset('adminpanel/assets/vendors/jquery-asColorPicker/jquery-asColorPicker.min.js')); ?>"></script>
        <script src="<?php echo e(asset('adminpanel/assets/vendors/x-editable/bootstrap-editable.min.js')); ?>"></script>
        <script src="<?php echo e(asset('adminpanel/assets/vendors/moment/moment.min.js')); ?>"></script>
        <script src="<?php echo e(asset('adminpanel/assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js')); ?>"></script>
        <script src="<?php echo e(asset('adminpanel/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
        <script src="<?php echo e(asset('adminpanel/assets/vendors/dropify/dropify.min.js')); ?>"></script>
        <script src="<?php echo e(asset('adminpanel/assets/vendors/jquery-file-upload/jquery.uploadfile.min.js')); ?>"></script>
        <script src="<?php echo e(asset('adminpanel/assets/vendors/jquery-tags-input/jquery.tagsinput.min.js')); ?>"></script>
        <script src="<?php echo e(asset('adminpanel/assets/vendors/dropzone/dropzone.js')); ?>"></script>
        <script src="<?php echo e(asset('adminpanel/assets/vendors/jquery.repeater/jquery.repeater.min.js')); ?>"></script>
        <script src="<?php echo e(asset('adminpanel/assets/vendors/inputmask/jquery.inputmask.bundle.js')); ?>"></script>
        <!-- End plugin js for this page -->

        <!-- Custom js for this page -->
        <script src="<?php echo e(asset('adminpanel/assets/js/formpickers.js')); ?>"></script>
        <script src="<?php echo e(asset('adminpanel/assets/js/form-addons.js')); ?>"></script>
        <script src="<?php echo e(asset('adminpanel/assets/js/x-editable.js')); ?>"></script>
        <script src="<?php echo e(asset('adminpanel/assets/js/dropify.js')); ?>"></script>
        <script src="<?php echo e(asset('adminpanel/assets/js/dropzone.js')); ?>"></script>
        <script src="<?php echo e(asset('adminpanel/assets/js/jquery-file-upload.js')); ?>"></script>
        <script src="<?php echo e(asset('adminpanel/assets/js/formpickers.js')); ?>"></script>
        <script src="<?php echo e(asset('adminpanel/assets/js/form-repeater.js')); ?>"></script>
        <script src="<?php echo e(asset('adminpanel/assets/js/inputmask.js')); ?>"></script>
        <!-- End custom js for this page -->

        <script src="<?php echo e(asset('adminpanel/assets/js/jquery.multi-select.min.js')); ?>"></script>

        <script src="<?php echo e(asset('adminpanel/assets/vendors/dropify/dropify.min.js')); ?>"></script>
        <script src="<?php echo e(asset('adminpanel/assets/js/dropify.js')); ?>"></script>

        <script src="//cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
                    url: "<?php echo e(route('vendor.getsubcategorycpt')); ?>",
                    type: "POST",
                    data:{categoryid:catId, _token: '<?php echo e(csrf_token()); ?>'},
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
                    url: "<?php echo e(route('vendor.getsubcategoryitemcpt')); ?>",
                    type: "POST",
                    data:{subcategoryid:subcatId, _token: '<?php echo e(csrf_token()); ?>'},
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
                    url: "<?php echo e(route('vendor.getvariationBysubcategoryitem')); ?>",
                    type: "POST",
                    data:{subcategoryitemid:subcatitemId, _token: '<?php echo e(csrf_token()); ?>'},
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
</body>

</html>
<?php /**PATH E:\webdev\hemchhaya\resources\views/vendor/variationitems/edit-variationitem.blade.php ENDPATH**/ ?>