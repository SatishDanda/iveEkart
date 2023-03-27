<?php $__env->startSection('content'); ?>

    <div class="m-50">
        <div class="col-md-10">
            <h3><?php echo e(trans('core/base::errors.404_title')); ?></h3>
            <p><?php echo e(trans('core/base::errors.reasons')); ?></p>
            <ul>
                <?php echo BaseHelper::clean(trans('core/base::errors.404_msg')); ?>

            </ul>

            <p><?php echo BaseHelper::clean(trans('core/base::errors.try_again', ['link' => route('dashboard.index')])); ?></p>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('core/base::errors.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/core/base/resources/views/errors/404.blade.php ENDPATH**/ ?>