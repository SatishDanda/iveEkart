<?php $__env->startSection('content'); ?>
    <?php echo Form::open(['route' => 'customer.post.change-password', 'class' => 'ps-form--account-setting', 'method' => 'POST']); ?>

    <div class="ps-form__header">
        <h3><?php echo e(SeoHelper::getTitle()); ?></h3>
    </div>
    <div class="ps-form__content">
        <div class="form-group <?php if($errors->has('old_password')): ?> has-error <?php endif; ?>">
            <label for="old_password"><?php echo e(__('Current password')); ?>:</label>
            <input type="password" class="form-control" name="old_password" id="old_password"
                   placeholder="<?php echo e(__('Current Password')); ?>">
            <?php echo Form::error('old_password', $errors); ?>

        </div>
        <div class="form-group <?php if($errors->has('password')): ?> has-error <?php endif; ?>">
            <label for="password"><?php echo e(__('New password')); ?>:</label>
            <input type="password" class="form-control" name="password" id="password"
                   placeholder="<?php echo e(__('New Password')); ?>">
            <?php echo Form::error('password', $errors); ?>

        </div>
        <div class="form-group <?php if($errors->has('password_confirmation')): ?> has-error <?php endif; ?>">
            <label for="password_confirmation"><?php echo e(__('Password confirmation')); ?>:</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                   placeholder="<?php echo e(__('Password Confirmation')); ?>">
            <?php echo Form::error('password_confirmation', $errors); ?>

        </div>

        <div class="form-group text-center">
            <div class="form-group submit">
                <button class="ps-btn"><?php echo e(__('Update')); ?></button>
            </div>
        </div>
    </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.customers.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/views/ecommerce/customers/change-password.blade.php ENDPATH**/ ?>