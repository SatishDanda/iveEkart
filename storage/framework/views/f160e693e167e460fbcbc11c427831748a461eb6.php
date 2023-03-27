<div class="tools">
    <?php
        $hiddenIcons = '';
        if (Arr::get($settings, 'show_state', true) && Arr::get($settings, 'state', 'expand') == 'collapse') {
            $hiddenIcons = 'd-none';
        }
    ?>
    <?php if(Arr::get($settings, 'show_predefined_ranges', false) && count($predefinedRanges)): ?>
        <div class="predefined-ranges ui-select-wrapper d-inline-block <?php echo e($hiddenIcons); ?>">
            <select name="predefined_range" class="ui-select py-0">
                <?php $__currentLoopData = $predefinedRanges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item['key']); ?>" <?php if($item['key'] == Arr::get($settings, 'predefined_range')): ?> selected <?php endif; ?>><?php echo e($item['label']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <svg class="svg-next-icon svg-next-icon-size-16">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#select-chevron"></use>
            </svg>
        </div>
    <?php endif; ?>

    <?php if(Arr::get($settings, 'show_state', true)): ?>
        <a href="#"
            class="<?php echo e(Arr::get($settings, 'state', 'expand')); ?> collapse-expand"
            data-bs-toggle="tooltip"
            title="<?php echo e(trans('core/dashboard::dashboard.collapse_expand')); ?>"
            data-state="<?php echo e(Arr::get($settings, 'state', 'expand') == 'collapse' ? 'expand' : 'collapse'); ?>"></a>
    <?php endif; ?>

    <?php if(Arr::get($settings, 'show_reload', true)): ?>
        <a href="#"
            class="reload <?php echo e($hiddenIcons); ?>"
            data-bs-toggle="tooltip"
            title="<?php echo e(trans('core/dashboard::dashboard.reload')); ?>"></a>
    <?php endif; ?>

    <?php if(Arr::get($settings, 'show_fullscreen', true)): ?>
        <a href="#"
            class="fullscreen <?php echo e($hiddenIcons); ?>"
            data-bs-toggle="tooltip"
            data-bs-original-title="<?php echo e(trans('core/dashboard::dashboard.fullscreen')); ?>"
            title="<?php echo e(trans('core/dashboard::dashboard.fullscreen')); ?>"> </a>
    <?php endif; ?>

    <?php if(Arr::get($settings, 'show_remove', true)): ?>
        <a href="#" class="remove" data-bs-toggle="tooltip" title="<?php echo e(trans('core/dashboard::dashboard.hide')); ?>"></a>
    <?php endif; ?>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/core/dashboard/resources/views/partials/tools.blade.php ENDPATH**/ ?>