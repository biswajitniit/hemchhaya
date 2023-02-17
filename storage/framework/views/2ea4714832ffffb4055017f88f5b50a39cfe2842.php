<?php $__env->startSection('title', 'Salesanta | Category wise landing page'); ?>
<?php $__env->startSection('content'); ?>



<!-- main-area -->
<main>
    <!-- breadcrumb-area -->
    
    <!-- breadcrumb-area-end -->



    <!-- services-area -->
    <section class="services-area services-bg">
        <div class="container">
            <div class="container-inner-wrap">
                <div class="row justify-content-center">

                    <?php if($subcategoryitem): ?>
                        <?php $__currentLoopData = $subcategoryitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                                <div class="services-item">
                                    <div class="content">
                                        <h5>
                                             <a href="<?php echo e(route('home.sub-cat-item-landing-page',['subcatitemname='.create_slug($row->sub_category_item_name).'&cid='.Crypt::encryptString($row->category_id).'&scid='.Crypt::encryptString($row->sub_category_id).'&sciid='.Crypt::encryptString($row->id)])); ?>"><?php echo e($row->sub_category_item_name); ?></a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>
    <!-- services-area-emd -->

    


</main>
<!-- main-area-end -->






<?php $__env->startPush('frontend-scripts'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/all-subcategory-item-list.blade.php ENDPATH**/ ?>