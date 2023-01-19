
<?php $__env->startSection('title', 'Edit Attribute'); ?>
<?php $__env->startSection('content'); ?>


<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Edit Attribute</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('attribute')); ?>">Attributes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Attributes</li>
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



              <form class="cmxform" id="editattribute" method="post" action="<?php echo e(route('admin.edit-attribute-items-post')); ?>" name="editattribute">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="attributeid" value="<?php echo e($attribute->id); ?>">
                <fieldset>


                    <div class="form-group">
                        <label for="column_name">Column Name </label>
                        <input id="column_name" class="form-control" name="column_name" type="text" value="<?php echo e($attribute->column_name); ?>">
                    </div>

                  <div class="form-group">
                    <label for="column_type">Column Type</label>
                    <select name="column_type" class="js-example-basic-single" style="width:100%">
                        <option value="">Select Column Type</option>
                        <option value="1" <?php if($attribute->id == 1): ?> selected="selected" <?php endif; ?>>TextBox</option>
                        <option value="4" <?php if($attribute->id == 2): ?> selected="selected" <?php endif; ?>>Dropdown</option>
                        <option value="5" <?php if($attribute->id == 3): ?> selected="selected" <?php endif; ?>>Multi Select Dropdown</option>
                        <option value="6" <?php if($attribute->id == 3): ?> selected="selected" <?php endif; ?>>Editor</option>
                        
                    </select>
                  </div>


                  <div class="form-group">
                    <label for="column_validation">Column Validation</label>
                    <select name="column_validation" class="js-example-basic-single" style="width:100%;">
                        <option value="">Select Column Validation</option>
                        <option value="1" <?php if($attribute->column_validation == 1): ?> selected="selected" <?php endif; ?>>Optional</option>
                        <option value="2" <?php if($attribute->column_validation == 2): ?> selected="selected" <?php endif; ?>>Required</option>
                    </select>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="status" id="status1" value="1" <?php if($attribute->status == 1): ?> checked <?php endif; ?>> Active </label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="status" id="status2" value="2" <?php if($attribute->status == 2): ?> checked <?php endif; ?>> InActive </label>
                      </div>
                    </div>
                  </div>



                  <input class="btn btn-primary" type="submit" value="Submit">
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
        $(".alert").delay(2000).slideUp(200, function () {
            $(this).alert('close');
        });

        $(function() {
            // validate signup form on keyup and submit
            $("#addsubcategoryitem").validate({
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
            if ($(".subcategory").length) {
                $(".subcategory").select2();
            }
        })(jQuery);

        $("document").ready(function () {
            $('select[name="category_id"]').on('change', function () {
                var catId = $(this).val();
                if (catId) {
                    $.ajax({
                        url: "<?php echo e(route('admin.getsubcategory')); ?>",
                        type: "POST",
                        data:{categoryid:catId, _token: '<?php echo e(csrf_token()); ?>'},
                        dataType: "json",
                        success: function (returndata) {
                            $('select[name="sub_category_id"]').empty();
                            $.each(returndata, function (key, value) {
                                $('select[name="sub_category_id"]').append('<option value=" ' + value.id + '">' + value.text + '</option>');
                            })
                        }
                    })
                } else {
                    $('select[name="sub_category_id"]').empty();
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/admin/attribute/edit-attribute.blade.php ENDPATH**/ ?>