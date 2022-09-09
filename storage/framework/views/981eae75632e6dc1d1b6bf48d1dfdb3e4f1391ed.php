
<?php $__env->startSection('title', 'variation item list search'); ?>
<?php $__env->startSection('content'); ?>

<div class="main-panel">
    <div class="content-wrapper pb-0">
        <div class="page-header">
            <h3 class="page-title">Search variation items</h3>
            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                <button type="button" onclick="location.href='<?php echo e(route('vendor.add-variationitem')); ?>'" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text"><i class="mdi mdi-plus-circle"></i> Add variation items</button>
            </div>
        </div>

        <!-- first row starts here -->
        <div class="row">
            <div class="col-xl-12 stretch-card grid-margin">
                <div class="card">
                    <form action="<?php echo e(route('vendor.searchvariationitemlist')); ?>" name="searchvariationitemlist" id="searchvariationitemlist" method="GET">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <select name="category" class="category" style="width: 100%;">
                                            <option value="">Select Category</option>
                                            <?php if($category): ?> <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(Crypt::encryptString($rowcategory->id)); ?>" <?php if($rowcategory->id == Crypt::decryptString(request()->category)): ?> selected <?php endif; ?>><?php echo e($rowcategory->category_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <select name="subcategory" class="subcategory" style="width: 100%;">
                                            <option value="">Select Sub Category</option>
                                            <?php
                                            $getsubcategorylistbycategory = GetSubcategoryBycatid(Crypt::decryptString(request()->category));
                                            ?>
                                            <?php if($getsubcategorylistbycategory): ?> <?php $__currentLoopData = $getsubcategorylistbycategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(Crypt::encryptString($rowsubcategory->id)); ?>" <?php if($rowsubcategory->id == Crypt::decryptString(request()->subcategory)): ?> selected <?php endif; ?>><?php echo e($rowsubcategory->sub_category_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>											
											
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <select name="subcategoryitem" class="subcategoryitem" style="width: 100%;">
                                            <option value="">Select Sub Category Item</option>
                                            <?php
                                                $getsubcategoryitemlistbycategory = GetSubcategoryitemBysubcatid(Crypt::decryptString(request()->subcategory));
                                            ?>
                                            <?php if($getsubcategoryitemlistbycategory): ?> <?php $__currentLoopData = $getsubcategoryitemlistbycategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowsubcategoryitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(Crypt::encryptString($rowsubcategoryitem->id)); ?>" <?php if($rowsubcategoryitem->id == Crypt::decryptString(request()->subcategoryitem)): ?> selected <?php endif; ?>><?php echo e($rowsubcategoryitem->sub_category_item_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>											
											
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <select name="variation" class="variation" style="width: 100%;">
                                            <option value="">Select Variation</option>
                                            <?php
                                                $getvariation = GetVariation(Crypt::decryptString(request()->subcategoryitem));
                                            ?>
                                            <?php if($getvariation): ?> <?php $__currentLoopData = $getvariation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowvariation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(Crypt::encryptString($rowvariation->id)); ?>" <?php if($rowvariation->id == Crypt::decryptString(request()->variation)): ?> selected <?php endif; ?>><?php echo e($rowvariation->variation_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>												
											
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

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Variation items table</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mb-none" id="my-table">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th>Variation Item Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="myModal" class="modal fade" role="dialog" >
            <div class="modal-dialog" style="width:700px;max-width:initial;height:500px;">
            <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-body">

                    </div>
                    
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




<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(function() {
            // validate signup form on keyup and submit
            $("#searchattribute").validate({
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
            if ($(".variation").length) {
                $(".variation").select2();
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

        $('select[name="subcategoryitem"]').on('change', function () {
            var subcatitemId = $(this).val();
            //alert(subcatitemId); return false;
            if (subcatitemId) {
                $.ajax({
                    url: "<?php echo e(route('vendor.getvariation')); ?>",
                    type: "POST",
                    data:{subcategoryitemid:subcatitemId, _token: '<?php echo e(csrf_token()); ?>'},
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



        $(".alert").delay(2000).slideUp(200, function () {
            $(this).alert('close');
        });


        $(document).ready(function(){
        // DataTable
            $('#my-table').DataTable({
                processing: true,
                serverSide: true,
                lengthMenu: [[100, 200, 300], [100, 200, 300]],
                order: [[ 0, "asc" ]],
                columnDefs: [{
                    "searchable": true,
                    "orderable": false,
                    "targets": 0
                }],
                "ajax": {
                    data: ({categoryid:'<?php echo e(Crypt::decryptString(request()->category)); ?>',subcategoryid:'<?php echo e(Crypt::decryptString(request()->subcategory)); ?>',subcategoryitemid:'<?php echo e(Crypt::decryptString(request()->subcategoryitem)); ?>',variationid:'<?php echo e(Crypt::decryptString(request()->variation)); ?>',_token: '<?php echo e(csrf_token()); ?>'}),
                    url : "<?php echo e(url('/')); ?>/searchvariationitemlistajax",
                    type : 'GET',
                },
                columns: [
                        {data: 'variation_item_name' },
                        {
                            data: 'status',
                            render: function (data, type, row){
                                if(data == "Active"){
                                    return '<label class="badge badge-success">Active</label>';
                                }else{
                                    return '<label class="badge badge-danger">In Active</label>';
                                }
                            },
                        },
                       {
                            data: 'action',
                            render: function (data, type, row){
                                return '<a href="<?php echo url("vendor/add-variationitem")?>/'+data+'" title="Edit Variation Item"><i class="mdi mdi-table-edit"></i></a> | <a href="<?php echo url("vendor/variationitemtrash")?>/'+data+'" title="Trash Variation Item" onclick="return confirm("Are you sure?")"><i class="mdi mdi-delete-forever"></i></a> ';
                            },
                        },

                ]
            });
        });

        function confirmMsg()
        {
            var answer = confirm("Delete selected record?")
            if (answer){
                return true;
            }
            return false;
        }
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.vendor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/vendor/variationitems/variationitem-list-search.blade.php ENDPATH**/ ?>