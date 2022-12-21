
<?php $__env->startSection('title', 'Add product summary'); ?>
<?php $__env->startSection('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">Product</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/vendor/products')); ?>">Products</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('vendor.add-product-category')); ?>">Change Categories</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Products</li>
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
                <input type="hidden" name="category_id" value="<?php echo e(request()->catid); ?>">
                <input type="hidden" name="sub_category_id" value="<?php echo e(request()->subcatid); ?>">
                <input type="hidden" name="sub_category_item_id" value="<?php echo e(request()->subcatitemid); ?>">
                <fieldset>


                    <h3>Description</h3>
                    <hr />
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name <span class="required">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control" id="name" placeholder="" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brand" class="col-sm-3 col-form-label">Brand <span class="required">*</span></label>
                            <div class="col-sm-6">

                                <?php if(!empty(request()->catid) &&  !empty(request()->subcatid) && !empty(request()->subcatitemid)): ?>
                                    <?php
                                    $getBrand = GetAllActiveBrandList(request()->catid,request()->subcatid,request()->subcatitemid);
                                    ?>

                                    <select name="brand" class="brand" style="width: 100%;">
                                        <option value="">Select Brand</option>
                                        <?php if($getBrand): ?>
                                            <?php $__currentLoopData = $getBrand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowbrand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($rowbrand->id); ?>"><?php echo e($rowbrand->brand_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>

                                <?php endif; ?>


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="highlights" class="col-sm-3 col-form-label">Highlights <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="highlights" id="highlights-ckeditor" rows="10" cols="80"/></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Description <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <textarea name="description" id="description-ckeditor" rows="10" cols="80"/></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Is featured?</label>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="is_featured" id="is_featured1" value="1" > Yes </label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="is_featured" id="is_featured2" value="2" checked> No </label>
                                </div>
                            </div>
                        </div>

                      <hr />
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
                            <label for="manufacture_details" class="col-sm-3 col-form-label">Manufacture Details <span class="required">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" name="manufacture_details" class="form-control" id="manufacture_details" placeholder="" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="packer_details" class="col-sm-3 col-form-label">Packer Details <span class="required">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" name="packer_details" class="form-control" id="packer_details" placeholder="" />
                            </div>
                        </div>

                    <hr />
                    <h3>Product has variations</h3>
                    <hr />

                        <?php if(!empty(request()->catid) &&  !empty(request()->subcatid) && !empty(request()->subcatitemid)): ?>
                        <?php
                        $getVariation = GetVariationlistonaddproduct(request()->catid,request()->subcatid,request()->subcatitemid);
                        ?>

                        <?php if($getVariation): ?>
                            <div class="form-group row">
                                <?php $__currentLoopData = $getVariation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowvariation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-sm-6">
                                        <label for="variation" class="col-form-label"> <?php echo e($rowvariation->variation_name); ?></label>
                                        <select name="variation[]" class="variation" style="width: 100%;">
                                        <option value="">Select One</option>
                                        <?php
                                            $getVariationitem = GetVariationitemlistonaddproduct(request()->catid,request()->subcatid,request()->subcatitemid,$rowvariation->id);
                                            ?>
                                            <?php if($getVariationitem): ?>
                                                <?php $__currentLoopData = $getVariationitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowvariationitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($rowvariationitem->id); ?>"><?php echo e($rowvariationitem->variation_item_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="front_view_image" class="col-form-label">Front View Image <span class="required">*</span></label>
                            <input type="file" name="front_view_image" class="dropify" />
                        </div>
                        <div class="col-sm-3">
                            <label for="back_view_image" class="col-form-label">Back View Image </label>
                            <input type="file" name="back_view_image" class="dropify" />
                        </div>
                        <div class="col-sm-3">
                            <label for="side_view_image" class="col-form-label">Side View Image </label>
                            <input type="file" name="side_view_image" class="dropify" />
                        </div>
                        <div class="col-sm-3">
                            <label for="open_view_image" class="col-form-label">Open View Image </label>
                            <input type="file" name="open_view_image" class="dropify" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="sku" class="col-form-label">SKU <span class="required">*</span></label>
                            <input type="text" name="sku"  class="form-control" />
                        </div>
                        <div class="col-sm-3">
                            <label for="price" class="col-form-label">Price <span class="required">*</span></label>
                            <input type="text" name="price"  class="form-control" />
                        </div>
                        <div class="col-sm-3">
                            <label for="sale_price" class="col-form-label">Your Selling Price <span class="required">*</span></label>
                            <input type="text" name="sale_price"  class="form-control" />
                        </div>
                        <div class="col-sm-3">
                            <label for="quantity" class="col-form-label">Stock Quantity <span class="required">*</span></label>
                            <input type="text" name="quantity"  class="form-control" />
                        </div>
                    </div>

                    <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                        <input type="checkbox" name="allow_customer_checkout_when_this_product_out_of_stock" value="1" class="form-check-input"> Allow customer checkout when this product out of stock <i class="input-helper"></i> </label>
                    </div>

                    <div class="form-group row">
                        <label for="video_link" class="col-sm-3 col-form-label">Youtube Video Link </label>
                        <div class="col-sm-6">
                            <input type="text" name="video_link" class="form-control" id="video_link" placeholder="" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="product_pdf" class="col-sm-3 col-form-label">Product Pdf</label>
                        <div class="col-sm-6">
                            <input type="file" name="product_pdf" class="form-control" id="product_pdf" placeholder="" />
                        </div>
                    </div>



                <hr />
                <h6>Packaging Details</h6>
                <hr />

                <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="weight" class="col-form-label">Packaging Weight (Kg) <span class="required">*</span></label>
                                <input type="text" name="weight"  class="form-control" />
                            </div>
                            <div class="col-sm-6">
                                <label for="length" class="col-form-label">Packaging Length (cm) <span class="required">*</span></label>
                                <input type="text" name="length"  class="form-control" />
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="breadth" class="col-form-label">Packaging Breadth (cm) <span class="required">*</span></label>
                                <input type="text" name="breadth"  class="form-control" />
                            </div>
                            <div class="col-sm-6">
                                <label for="height" class="col-form-label">Packaging Height (cm) <span class="required">*</span></label>
                                <input type="text" name="height"  class="form-control" />
                            </div>
                        </div>



                        <?php if(!empty(request()->catid) &&  !empty(request()->subcatid) && !empty(request()->subcatitemid)): ?>
                            <?php
                                $getattributecategory = Getattributecategory(request()->catid,request()->subcatid,request()->subcatitemid);
                            ?>
                            <?php if($getattributecategory): ?>
                                <?php $__currentLoopData = $getattributecategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowattributecat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="hidden" name="attribute[]" value="<?php echo e($rowattributecat->id); ?>">
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
                                                            <input type="text" name="attributeitem[<?php echo e($rowattribute->id); ?>]" class="form-control" id="<?php echo e($rowattribute->column_slug); ?>" placeholder="" <?php if($rowattribute->column_validation == 2): ?> required <?php endif; ?>/>
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

                        <hr />
                        <h3>Search engine optimize</h3>
                        <hr />

                        <div class="form-group">
                            <label for="search_keywords">Search Keywords</label>
                            <input name="search_keywords" id="tags" value="" />
                        </div>
                        <div class="form-group">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" id="tags" value="" />
                        </div>
                        <div class="form-group">
                            <label for="meta_keywords">Meta Keywords</label>
                            <textarea class="form-control" id="meta_keywords" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea class="form-control" id="meta_description" rows="4"></textarea>
                        </div>


                  <input class="btn btn-primary btn-lg" type="submit" value="Submit">
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
            // if ($(".category_id").length) {
            //     $(".category_id").select2();
            // }
            // if ($(".subcategory").length) {
            //     $(".subcategory").select2();
            // }
            // if ($(".subcategoryitem").length) {
            //     $(".subcategoryitem").select2();
            // }
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

<?php echo $__env->make('layouts.vendor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/vendor/product/add-product.blade.php ENDPATH**/ ?>