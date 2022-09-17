
<?php $__env->startSection('title', 'Edit Sub Category'); ?>
<?php $__env->startSection('content'); ?>


<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Edit Sub Category </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.subcategory')); ?>">Sub Categorys</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Sub Category</li>
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



              <form class="cmxform" id="editsubcategory" method="post" action="<?php echo e(route('admin.edit-sub-category-post')); ?>" name="editsubcategory">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="subcatid" value="<?php echo e($subcategory->id); ?>}">
                <fieldset>

                    <div class="form-group">
                      <label for="category_id">Category Name</label>
                      <select name="category_id" class="js-example-basic-single" style="width:100%" >
                          <option value="">Select Category</option>
                          <?php if($category): ?>
                              <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($rowcategory->id); ?>" <?php if($rowcategory->id == $subcategory->category_id): ?> selected="selected" <?php endif; ?>><?php echo e($rowcategory->category_name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>

                      </select>
                    </div>

                    <div class="form-group">
                      <label for="sub_category_name">Sub Category Name </label>
                      <input id="sub_category_name" class="form-control" name="sub_category_name" type="text" value="<?php echo e($subcategory->sub_category_name); ?>">
                    </div>

                    <div class="form-group">
                      <label for="sub_category_sort_no">Menu Order No </label>
                      <input id="sub_category_sort_no" class="form-control" name="sub_category_sort_no" type="text"  value="<?php echo e($subcategory->sub_category_sort_no); ?>">
                    </div>

                    <div class="form-group">
                      <label for="menu_dropdown">Menu Dropdown</label>
                      <select name="menu_dropdown" class="js-example-basic-single" style="width:100%" >
                          <option value="1" <?php if($subcategory->menu_dropdown == 1): ?> selected="selected" <?php endif; ?>>Yes</option>
                          <option value="2" <?php if($subcategory->menu_dropdown == 2): ?> selected="selected" <?php endif; ?>>No</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="menu_show_sub_item">Sub Menu Item Show / Hide</label>
                      <select name="menu_show_sub_item" class="js-example-basic-single" style="width:100%" >
                          <option value="1" <?php if($subcategory->menu_show_sub_item == 1): ?> selected="selected" <?php endif; ?>>Show</option>
                          <option value="2" <?php if($subcategory->menu_show_sub_item == 2): ?> selected="selected" <?php endif; ?>>Not Show</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="menu_show_div">Menu Show Div</label>
                      <select name="menu_show_div" class="js-example-basic-single" style="width:100%" >
                          <option value="1" <?php if($subcategory->menu_show_div == 1): ?> selected="selected" <?php endif; ?>>Col-A</option>
                          <option value="2" <?php if($subcategory->menu_show_div == 2): ?> selected="selected" <?php endif; ?>>Col-B</option>
                          <option value="3" <?php if($subcategory->menu_show_div == 3): ?> selected="selected" <?php endif; ?>>Col-C</option>
                          <option value="4" <?php if($subcategory->menu_show_div == 4): ?> selected="selected" <?php endif; ?>>Col-D</option>
                      </select>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Status</label>
                      <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="status1" value="1" <?php if($subcategory->status == 1): ?> checked <?php endif; ?>> Active </label>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="status2" value="2" <?php if($subcategory->status == 2): ?> checked <?php endif; ?>> InActive </label>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/admin/subcategory/edit-sub-category.blade.php ENDPATH**/ ?>