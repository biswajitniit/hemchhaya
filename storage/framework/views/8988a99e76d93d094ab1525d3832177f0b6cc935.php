<?php $__env->startSection('title', 'Add Category'); ?>
<?php $__env->startSection('content'); ?>


<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Add Category </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.category')); ?>">Categorys</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Category</li>
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



              <form class="cmxform" id="addcategory" method="post" action="<?php echo e(route('admin.add-category-post-data')); ?>" name="addcategory">
                <?php echo csrf_field(); ?>
                <fieldset>


                  <div class="form-group">
                    <label for="category_name">Category Name <span class="required">*</span></label>
                    <input id="category_name" class="form-control" name="category_name" type="text">
                  </div>
                  <div class="form-group">
                    <label for="category_sort_no">Category Sort No </label>
                    <input id="category_sort_no" class="form-control" name="category_sort_no" type="text">
                  </div>

                  <div class="form-group">
                    <label for="menu_dropdown">Menu Dropdown</label>
                    <select name="menu_dropdown" class="js-example-basic-single" style="width:100%" >
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="menu_show_div_type">Menu Show Div Type</label>
                    <select name="menu_show_div_type" class="js-example-basic-single" style="width:100%" >
                        <option value="1">Dropdown</option>
                        <option value="2">Megamenu</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="menu_show_in_header">Menu Show In Header</label>
                    <select name="menu_show_in_header" class="js-example-basic-single" style="width:100%" >
                        <option value="1">Show</option>
                        <option value="2">Not Show</option>
                    </select>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="status" id="status1" value="1" checked> Active </label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="status" id="status2" value="2"> InActive </label>
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
            $("#addcategory").validate({
            rules: {
                category_name: "required",
            },
            messages: {
                category_name: "Please enter category name",
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

    </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/admin/category/add-category.blade.php ENDPATH**/ ?>