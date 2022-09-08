
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
                  <h3>Categories</h3>
                    <section>
                        <h6>Categories Information</h6>
                        <hr />
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

                    </section>


                  <h3>Description</h3>
                    <section>

                        <div class="form-group row">
                            <label for="seller_brand_name" class="col-sm-3 col-form-label">Name <span class="required">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="seller_brand_name" placeholder="" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="seller_brand_name" class="col-sm-3 col-form-label">Brand <span class="required">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="seller_brand_name" placeholder="" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="seller_brand_name" class="col-sm-3 col-form-label">Highlights <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="highlights" id="highlights-ckeditor" rows="10" cols="80"/></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="seller_brand_name" class="col-sm-3 col-form-label">Description <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="description" id="description-ckeditor" rows="10" cols="80"/></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Is featured?</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status" id="status1" value="1" > Yes </label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="status" id="status2" value="2" checked> No </label>
                              </div>
                            </div>
                          </div>


                        <h6>Manufacturing Details</h6>
                        <hr />
                        <div class="form-group row">
                            <label for="country_of_origin" class="col-sm-3 col-form-label">Country of Origin <span class="required">*</span></label>
                            <div class="col-sm-6">
                                <select name="country_of_origin" class="country_of_origin" style="width: 100%;">
                                    <option value="">Select Country</option>
                                    <option value="INDIA">INDIA</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="seller_hsn" class="col-sm-3 col-form-label">Manufacture Details <span class="required">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="seller_hsn" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="seller_hsn" class="col-sm-3 col-form-label">Packer Details <span class="required">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="seller_hsn" placeholder="" />
                            </div>
                        </div>



                    </section>


                    <h3>Product has variations</h3>
                    <hr>
                    <section>
                        <h6>Product Images / Variation</h6>
                        <hr>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label for="front_view_image" class="col-form-label">Front View Image <span class="required">*</span></label>
                                <input type="file" name="front_view_image" class="dropify" required/>
                            </div>
                            <div class="col-sm-3">
                                <label for="back_view_image" class="col-form-label">Back View Image </label>
                                <input type="file" name="back_view_image" class="dropify" required/>
                            </div>
                            <div class="col-sm-3">
                                <label for="side_view_image" class="col-form-label">Side View Image </label>
                                <input type="file" name="side_view_image" class="dropify" required/>
                            </div>
                            <div class="col-sm-3">
                                <label for="open_view_image" class="col-form-label">Open View Image </label>
                                <input type="file" name="open_view_image" class="dropify" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label for="front_view_image" class="col-form-label">SKU <span class="required">*</span></label>
                                <input type="text" name="sku"  class="form-control" required/>
                            </div>
                            <div class="col-sm-3">
                                <label for="back_view_image" class="col-form-label">Price <span class="required">*</span></label>
                                <input type="text" name="price"  class="form-control" required/>
                            </div>
                            <div class="col-sm-3">
                                <label for="side_view_image" class="col-form-label">Your Selling Price <span class="required">*</span></label>
                                <input type="text" name="selling_price"  class="form-control" required/>
                            </div>
                            <div class="col-sm-3">
                                <label for="side_view_image" class="col-form-label">Quantity <span class="required">*</span></label>
                                <input type="text" name="quantity"  class="form-control" required/>
                            </div>
                        </div>

                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"> Allow customer checkout when this product out of stock <i class="input-helper"></i> </label>
                        </div>
                        <hr />
                        <h6>Packaging Details</h6>
                        <hr />
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="front_view_image" class="col-form-label">Packaging Weight (Kg) <span class="required">*</span></label>
                                <input type="text" name="quantity"  class="form-control" required/>
                            </div>
                            <div class="col-sm-6">
                                <label for="back_view_image" class="col-form-label">Packaging Length (cm) <span class="required">*</span></label>
                                <input type="text" name="quantity"  class="form-control" required/>
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="side_view_image" class="col-form-label">Packaging Breadth (cm) <span class="required">*</span></label>
                                <input type="text" name="quantity"  class="form-control" required/>
                            </div>
                            <div class="col-sm-6">
                                <label for="open_view_image" class="col-form-label">Packaging Height (cm) <span class="required">*</span></label>
                                <input type="text" name="quantity"  class="form-control" required/>
                            </div>
                        </div>



                        <?php if(!empty(request()->catid) &&  !empty(request()->subcatid) && !empty(request()->subcatitemid)): ?>
                            <?php
                                $getattributecategory = Getattributecategory(request()->catid,request()->subcatid,request()->subcatitemid);
                            ?>
                            <?php if($getattributecategory): ?>
                                <?php $__currentLoopData = $getattributecategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowattributecat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <h6><?php echo e($rowattributecat->attribute_category_name); ?></h6>
                                <hr />


                                        <?php
                                        $getattribute = Getattributebyattributecategory($rowattributecat->id);
                                        ?>
                                        <?php if($getattribute): ?>
                                            <?php $__currentLoopData = $getattribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowattribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <?php if($rowattribute->column_type == 1): ?>
                                                    <!-- For TextBox -->
                                                    <div class="form-group row">
                                                        <label for="<?php echo e($rowattribute->column_slug); ?>" class="col-sm-3 col-form-label"><?php echo e($rowattribute->column_name); ?> <?php if($rowattribute->column_validation == 2): ?> <span class="required">*</span> <?php endif; ?></label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="<?php echo e($rowattribute->column_slug); ?>" placeholder="" <?php if($rowattribute->column_validation == 2): ?> required <?php endif; ?>/>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if($rowattribute->column_type == 2): ?>
                                                    <!-- For TextBox Password-->
                                                    <div class="form-group row">
                                                        <label for="<?php echo e($rowattribute->column_slug); ?>" class="col-sm-3 col-form-label"><?php echo e($rowattribute->column_name); ?> <?php if($rowattribute->column_validation == 2): ?> <span class="required">*</span> <?php endif; ?></label>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="<?php echo e($rowattribute->column_slug); ?>" placeholder="" <?php if($rowattribute->column_validation == 2): ?> required <?php endif; ?>/>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if($rowattribute->column_type == 3): ?>
                                                <!-- For TextBox Email-->
                                                <div class="form-group row">
                                                    <label for="<?php echo e($rowattribute->column_slug); ?>" class="col-sm-3 col-form-label"><?php echo e($rowattribute->column_name); ?> <?php if($rowattribute->column_validation == 2): ?> <span class="required">*</span> <?php endif; ?></label>
                                                    <div class="col-sm-6">
                                                        <input type="email" class="form-control" id="<?php echo e($rowattribute->column_slug); ?>" placeholder="" <?php if($rowattribute->column_validation == 2): ?> required <?php endif; ?>/>
                                                    </div>
                                                </div>
                                                <?php endif; ?>

                                                <?php if($rowattribute->column_type == 4): ?>
                                                <!-- For TextBox Dropdown-->
                                                <div class="form-group row">
                                                    <label for="<?php echo e($rowattribute->column_slug); ?>" class="col-sm-3 col-form-label"><?php echo e($rowattribute->column_name); ?> <?php if($rowattribute->column_validation == 2): ?> <span class="required">*</span> <?php endif; ?></label>
                                                    <div class="col-sm-6">
                                                        <select name="<?php echo e($rowattribute->column_slug); ?>" id="<?php echo e($rowattribute->column_slug); ?>"  style="width: 100%;" <?php if($rowattribute->column_validation == 2): ?> required <?php endif; ?>>
                                                            <option value="">Select Column Validation</option>
                                                            <option value="1">Optional</option>
                                                            <option value="2">Required</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <?php endif; ?>

                                                <?php if($rowattribute->column_type == 5): ?>
                                                <!-- For Tags-->
                                                <div class="form-group row">
                                                    <label for="<?php echo e($rowattribute->column_slug); ?>" class="col-sm-3 col-form-label"><?php echo e($rowattribute->column_name); ?> <?php if($rowattribute->column_validation == 2): ?> <span class="required">*</span> <?php endif; ?></label>
                                                    <div class="col-sm-6">
                                                        
                                                        <?php
                                                        $tags = explode(",", $rowattribute->tags);
                                                        ?>
                                                        <select id="ice-cream" name="ice-cream" multiple>
                                                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowtags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($rowtags); ?>"><?php echo e($rowtags); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </select>
                                                    </div>
                                                </div>
                                                <?php endif; ?>

                                                <?php if($rowattribute->column_type == 6): ?>
                                                <!-- For Tags-->
                                                <div class="form-group row">
                                                    <label for="<?php echo e($rowattribute->column_slug); ?>" class="col-sm-3 col-form-label"><?php echo e($rowattribute->column_name); ?> <?php if($rowattribute->column_validation == 2): ?> <span class="required">*</span> <?php endif; ?></label>
                                                    <div class="col-sm-6">



                                                    </div>
                                                </div>
                                                <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>




                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endif; ?>




                    </section>



                  <h3>Search engine optimize</h3>
                  <section>

                    

                    <div class="form-group">
                        <label for="column_name">Search Keywords</label>
                        <input name="search_keywords" id="tags" value="" />
                    </div>
                    <div class="form-group">
                        <label for="column_name">Meta Title</label>
                        <input type="text" name="search_keywords" class="form-control" id="tags" value="" />
                    </div>
                    <div class="form-group">
                        <label for="column_name">Meta Keywords</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="column_name">Meta Description</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
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
     CKEDITOR.replace( 'highlights-ckeditor' );
     CKEDITOR.replace( 'description-ckeditor' );

        $(".alert").delay(2000).slideUp(200, function () {
            $(this).alert('close');
        });

        $(function() {
            $('#ice-cream').multiSelect();

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
            if ($(".category_id").length) {
                $(".category_id").select2();
            }
            if ($(".subcategory").length) {
                $(".subcategory").select2();
            }
            if ($(".subcategoryitem").length) {
                $(".subcategoryitem").select2();
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

<?php echo $__env->make('layouts.vendor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/vendor/product/add-product.blade.php ENDPATH**/ ?>