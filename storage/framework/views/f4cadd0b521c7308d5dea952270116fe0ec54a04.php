
<?php $__env->startSection('title', 'Attribute category search category / subcategory / subcategory item wise'); ?>
<?php $__env->startSection('content'); ?>


<div class="main-panel">
    <div class="content-wrapper pb-0">
        <div class="page-header">
            <h3 class="page-title">Search attribute</h3>
            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                <button type="button" onclick="location.href='<?php echo e(route('admin.add-attribute-category')); ?>'" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                  <i class="mdi mdi-plus-circle"></i> Add Attribute </button>
            </div>
        </div>

        <!-- first row starts here -->
        <div class="row">
            <div class="col-xl-12 stretch-card grid-margin">
                <div class="card">

                    <form action="<?php echo e(route('admin.searchattributecategory')); ?>" name="searchattributecategory" id="searchattributecategory" method="GET">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <select name="category" class="category" style="width: 100%;">
                                            <option value="">Select Category</option>
                                            <?php if($category): ?>
                                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e(Crypt::encryptString($rowcategory->id)); ?>"><?php echo e($rowcategory->category_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
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
        $("#searchattributecategory").validate({
            rules: {
                category: "required",
                subcategory: "required",
                subcategoryitem : "required",
            },
            messages: {
                category: "Please select category",
                subcategory: "Please select sub category",
                subcategoryitem: "Please select sub category item",
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
    })(jQuery);

    $("document").ready(function () {
        $('select[name="category"]').on('change', function () {
            var catId = $(this).val();
            if (catId) {
                $.ajax({
                    url: "<?php echo e(route('admin.getsubcategoryattribute')); ?>",
                    type: "POST",
                    data:{categoryid:catId, _token: '<?php echo e(csrf_token()); ?>'},
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
                    url: "<?php echo e(route('admin.getsubcategoryitemattribute')); ?>",
                    type: "POST",
                    data:{subcategoryid:subcatId, _token: '<?php echo e(csrf_token()); ?>'},
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



    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/admin/attributecategory/attribute-category-list.blade.php ENDPATH**/ ?>