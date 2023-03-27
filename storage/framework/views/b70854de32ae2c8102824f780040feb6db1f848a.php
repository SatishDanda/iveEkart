<?php $__env->startSection('page'); ?>
    <div class="page-wrapper">

        <?php echo $__env->make('core/base::layouts.partials.top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="clearfix"></div>

        <div class="page-container page-container-gray">
            <div class="page-content" style="min-height: calc(100vh - 49px); height: 100%;">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <?php echo $__env->make('core/base::layouts.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('core/base::layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/core/base/resources/views/errors/master.blade.php ENDPATH**/ ?>