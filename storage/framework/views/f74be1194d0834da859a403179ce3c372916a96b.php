<?php $__env->startSection('content'); ?>
    <div id="dashboard-alerts">
        <verify-license-component verify-url="<?php echo e(route('settings.license.verify')); ?>" setting-url="<?php echo e(route('settings.options')); ?>"></verify-license-component>
        <?php if(config('core.base.general.enable_system_updater') && Auth::user()->isSuperUser()): ?>
            <check-update-component check-update-url="<?php echo e(route('system.check-update')); ?>" setting-url="<?php echo e(route('system.updater')); ?>"></check-update-component>
        <?php endif; ?>
    </div>
    <?php echo apply_filters(DASHBOARD_FILTER_ADMIN_NOTIFICATIONS, null); ?>

    <div class="row">
        <?php echo apply_filters(DASHBOARD_FILTER_TOP_BLOCKS, null); ?>

    </div>
    <div class="row">
        <?php $__currentLoopData = $statWidgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $widget; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div id="list_widgets" class="row">
        <?php $__currentLoopData = $userWidgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $widget; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php if(count($widgets) > 0): ?>
        <a href="#" class="manage-widget">
            <i class="fa fa-plus"></i>
            <?php echo e(trans('core/dashboard::dashboard.manage_widgets')); ?>

        </a>
        <?php echo $__env->make('core/dashboard::partials.modals', compact('widgets'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(BaseHelper::getAdminMasterLayoutTemplate(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/core/dashboard/resources/views/list.blade.php ENDPATH**/ ?>