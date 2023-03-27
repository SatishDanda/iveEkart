<?php $__env->startSection('content'); ?>
    <?php echo Form::open(['route' => 'customer.edit-account', 'class' => 'ps-form--account-setting', 'method' => 'POST']); ?>

        <ul class="nav nav-tabs ">
            <li class="nav-item">
                <a href="#tab_profile" class="nav-link active" data-toggle="tab"><?php echo e(SeoHelper::getTitle()); ?> </a>
            </li>
            <?php echo apply_filters(BASE_FILTER_REGISTER_CONTENT_TABS, null, auth('customer')->user()); ?>

        </ul>
        <div class="tab-content mx-2 my-4">
            <div class="tab-pane active" id="tab_profile">
                <div class="ps-form__content">
                    <div class="form-group">
                        <label for="name"><?php echo e(__('Full Name')); ?>:</label>
                        <input id="name" type="text" class="form-control" name="name" value="<?php echo e(auth('customer')->user()->name); ?>">
                    </div>
                    <?php echo Form::error('name', $errors); ?>

        
                    <div class="form-group <?php if($errors->has('dob')): ?> has-error <?php endif; ?>">
                        <label for="date_of_birth"><?php echo e(__('Date of birth')); ?>:</label>
                        <input id="date_of_birth" type="text" class="form-control" name="dob" value="<?php echo e(auth('customer')->user()->dob); ?>">
                    </div>
                    <?php echo Form::error('dob', $errors); ?>

                    <div class="form-group <?php if($errors->has('email')): ?> has-error <?php endif; ?>">
                        <label for="email"><?php echo e(__('Email')); ?>:</label>
                        <input id="email" type="text" class="form-control" disabled="disabled" value="<?php echo e(auth('customer')->user()->email); ?>" name="email">
                    </div>
                    <?php echo Form::error('email', $errors); ?>

        
                    <div class="form-group <?php if($errors->has('phone')): ?> has-error <?php endif; ?>">
                        <label for="phone"><?php echo e(__('Phone')); ?></label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="<?php echo e(__('Phone')); ?>" value="<?php echo e(auth('customer')->user()->phone); ?>">
                    </div>
                    <?php echo Form::error('phone', $errors); ?>

                </div>
            </div>
            <?php echo apply_filters(BASE_FILTER_REGISTER_CONTENT_TAB_INSIDE, null, auth('customer')->user()); ?>

        </div>
        <div class="form-group text-center">
            <div class="form-group submit">
                <button class="ps-btn"><?php echo e(__('Update')); ?></button>
            </div>
        </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.customers.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/views/ecommerce/customers/edit-account.blade.php ENDPATH**/ ?>