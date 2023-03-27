<?php
    Arr::set($attributes, 'class', Arr::get($attributes, 'class') . ' icon-select');
    Arr::set($attributes, 'data-empty', __('None'));
?>

<?php echo Form::customSelect($name, [$value => $value], $value, $attributes); ?>


<?php if (! $__env->hasRenderedOnce('209c73a1-a6ee-4cc4-992b-db4592adba64')): $__env->markAsRenderedOnce('209c73a1-a6ee-4cc4-992b-db4592adba64'); ?>
    <?php if(request()->ajax()): ?>
        <link media="all" type="text/css" rel="stylesheet" href="<?php echo e(Theme::asset()->url('fonts/Linearicons/Linearicons/Font/demo-files/demo.css')); ?>">
        <script src="<?php echo e(Theme::asset()->url('js/icons-field.js')); ?>?v=1.0.0"></script>
    <?php else: ?>
        <?php $__env->startPush('header'); ?>
            <link media="all" type="text/css" rel="stylesheet" href="<?php echo e(Theme::asset()->url('fonts/Linearicons/Linearicons/Font/demo-files/demo.css')); ?>">
            <script src="<?php echo e(Theme::asset()->url('js/icons-field.js')); ?>?v=1.0.0"></script>
        <?php $__env->stopPush(); ?>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/partials/forms/icons-field.blade.php ENDPATH**/ ?>