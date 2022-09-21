<?php $__env->startSection('title', 'Add products'); ?>
<?php $__env->startSection('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">Product Categories</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/vendor/products')); ?>">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Product Categories</li>
          </ol>
        </nav>
      </div>

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



              <form class="cmxform" id="addproduct" method="post" action="<?php echo e(route('vendor.add-product-post-data')); ?>" name="addproduct" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <fieldset>

                    

                        <div class="form-group row">
                            <label for="category_id" class="col-sm-3 col-form-label">Category name <span class="required">*</span></label>
                            <div class="col-sm-6">
                                <select name="category_id" class="category_id" style="width:100%">
                                    <option value="">Select category</option>
                                    <?php if($category): ?>
                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($rowcategory->id); ?>" <?php if(request()->catid == $rowcategory->id): ?> selected <?php endif; ?>><?php echo e($rowcategory->category_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sub_category_id" class="col-sm-3 col-form-label">Sub category <span class="required">*</span></label>
                            <div class="col-sm-6">
                                <select name="sub_category_id" class="subcategory" style="width: 100%;">
                                    <option value="">Select sub category</option>
                                    <?php if(request()->subcatid): ?>
                                        <?php
                                        $getsubcategorylistbycategory = GetSubcategoryBycatid(request()->catid);
                                        ?>
                                        <?php $__currentLoopData = $getsubcategorylistbycategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($rowsubcategory->id); ?>" <?php if($rowsubcategory->id == request()->subcatid): ?> selected <?php endif; ?>><?php echo e($rowsubcategory->sub_category_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sub_category_item_id" class="col-sm-3 col-form-label">Sub category item <span class="required">*</span></label>
                            <div class="col-sm-6">
                                <select name="sub_category_item_id" class="subcategoryitem" style="width: 100%;">
                                    <option value="">Select sub category item</option>
                                    <?php if(request()->subcatitemid): ?>
                                        <?php
                                        $getsubcategoryitemlistbycategory = GetSubcategoryitemBysubcatid(request()->subcatid);
                                        ?>
                                        <?php $__currentLoopData = $getsubcategoryitemlistbycategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowsubcategoryitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($rowsubcategoryitem->id); ?>" <?php if($rowsubcategoryitem->id == request()->subcatitemid): ?> selected <?php endif; ?>><?php echo e($rowsubcategoryitem->sub_category_item_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </select>
                            </div>
                        </div>

                        
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
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <?php echo e(date('Y')); ?> <a href="<?php echo e(url('/')); ?>" target="_blank">Hemchhaya</a>. All rights reserved.</span>
        </div>
    </footer>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->

<?php $__env->startPush('scripts'); ?>

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
            if ($(".brand").length) {
                $(".brand").select2();
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
                        url: "<?php echo e(route('admin.get_sub_category_on_product_page')); ?>",
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
                        url: "<?php echo e(route('admin.get_sub_category_item_on_product_page')); ?>",
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
                var catId = $(".category_id").val();
                var subcatId = $(".subcategory").val();
                var subcatitemId = $(this).val();

                location.href = '<?php echo url('/'); ?>/vendor/add-product?catid='+catId+'&subcatid='+subcatId+'&subcatitemid='+subcatitemId+'';
                // $.ajax({
                //     url: "<?php echo e(route('admin.get_attributecat_with_attribute_on_product_page')); ?>",
                //     type: "POST",
                //     data:{categoryid:catId,subcategoryid:subcatId,subcategoryitemid:subcatitemId, _token: '<?php echo e(csrf_token()); ?>'},
                //     dataType: "json",
                //     success: function (returndata) {

                //         //console.log(returndata); return false;
                //         $("#product_desc").html(returndata);

                //     }
                // });

            });

        });





    </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.vendor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/vendor/product/add-product-category.blade.php ENDPATH**/ ?>