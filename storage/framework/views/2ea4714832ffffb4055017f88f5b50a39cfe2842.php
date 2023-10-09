
<?php $__env->startSection('title', 'Salesanta | Category wise landing page'); ?>
<?php $__env->startSection('content'); ?>


<main>
    <div class="container custom-container">
        <div class="slider-category-wrap">
            <div class="row category-active slick-initialized slick-slider">
                <div class="slick-list draggable">
                    <div class="slick-track" style="opacity: 1; width: 1128px; transform: translate3d(0px, 0px, 0px);">
                        <div class="row">

                            <?php if($subcategoryitem): ?>
                                <?php $__currentLoopData = $subcategoryitem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-3 slick-slide slick-current slick-active pb-90" data-slick-index="0" aria-hidden="false" style="width: 188px;" tabindex="0">
                                        <div class="category-item active">
                                            <a href="<?php echo e(route('home.sub-cat-item-landing-page',['subcatitemname='.create_slug($row->sub_category_item_name).'&cid='.Crypt::encryptString($row->category_id).'&scid='.Crypt::encryptString($row->sub_category_id).'&sciid='.Crypt::encryptString($row->id)])); ?>" class="category-link" tabindex="0"></a>
                                            <div class="category-thumb">
                                                <img src="<?php echo e($row->sub_category_item_image); ?>" alt="" />
                                            </div>
                                            <div class="category-content">
                                                <h6 class="title"><?php echo e($row->sub_category_item_name); ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- main-area-end -->

<?php $__env->startPush('frontend-scripts'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\webdev\hemchhaya\resources\views/all-subcategory-item-list.blade.php ENDPATH**/ ?>