<?php $__env->startSection('content'); ?>

    <div class="ps-section--account-setting">
        <div class="ps-section__header">
            <h3><?php echo e(SeoHelper::getTitle()); ?></h3>
        </div>
        <div class="ps-section__content">
            <p><i class="icon-user"></i> <span class="d-inline-block"><?php echo e(__('Name')); ?>:</span> <strong><?php echo e(auth('customer')->user()->name); ?></strong></p>
            <?php if(auth('customer')->user()->dob): ?>
                <p><i class="icon-calendar-31"></i> <span class="d-inline-block"><?php echo e(__('Date of birth')); ?>:</span> <strong><?php echo e(auth('customer')->user()->dob); ?></strong></p>
            <?php endif; ?>
            <p><i class="icon-envelope"></i> <span class="d-inline-block"><?php echo e(__('Email')); ?>:</span> <strong><?php echo e(auth('customer')->user()->email); ?></strong></p>
            <p><i class="icon-phone-bubble"></i> <span class="d-inline-block"><?php echo e(__('Phone')); ?>:</span> <strong><?php echo e(auth('customer')->user()->phone ? auth('customer')->user()->phone : __('N/A')); ?></strong></p>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.customers.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/views/ecommerce/customers/overview.blade.php ENDPATH**/ ?>