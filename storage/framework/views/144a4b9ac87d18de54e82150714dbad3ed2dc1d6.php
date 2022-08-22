<?php $__env->startSection('title', 'Add products'); ?>
<?php $__env->startSection('content'); ?>



<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Product </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Products</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              
              <form id="example-form" action="#" autocomplete="off">
                <div>
                  <h3>Selling Information</h3>
                  <section>
                    <h6>Listing Information</h6>
                    <hr />
                    <div class="form-group row">
                        <label for="seller_sku_id" class="col-sm-3 col-form-label">Seller SKU Id <span class="required">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="seller_sku_id" placeholder="" autocomplete="nope" />
                        </div>
                    </div>

                    <h6>Price Details</h6>
                    <hr />
                    <div class="form-group row">
                        <label for="mrp" class="col-sm-3 col-form-label">MRP <span class="required">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="mrp" placeholder="" autocomplete="nope" />
                        </div>
                        <div class="col-sm-3">
                            <span>INR</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mrp" class="col-sm-3 col-form-label">Your Selling Price <span class="required">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="mrp" placeholder="" autocomplete="nope" />
                        </div>
                        <div class="col-sm-3">
                            <span>INR</span>
                        </div>
                    </div>
                    <h6>Inventory Details</h6>
                    <hr />

                </section>

                  <h3>Image</h3>
                  <section>
                    
                    <div class="form-group">
                      <label>First name</label>
                      <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter first name">
                    </div>
                    <div class="form-group">
                      <label>Last name</label>
                      <input type="password" class="form-control" placeholder="Last name">
                    </div>
                    <div class="form-group">
                      <label>Profession</label>
                      <input type="password" class="form-control" placeholder="Profession">
                    </div>
                  </section>
                  <h3>Price</h3>
                  <section>
                    
                    <div class="form-group">
                      <label>Comments</label>
                      <textarea class="form-control" rows="3"></textarea>
                    </div>
                  </section>
                  <h3>Meta Information</h3>
                  <section>
                    
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox"> I agree with the Terms and Conditions. </label>
                    </div>
                  </section>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!--vertical wizard-->

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

<?php echo $__env->make('layouts.vendor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/vendor/product/add-product.blade.php ENDPATH**/ ?>