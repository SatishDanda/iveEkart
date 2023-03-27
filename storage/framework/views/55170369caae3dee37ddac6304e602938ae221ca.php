<div class="ui-select-wrapper">
    <?php
        Arr::set($selectAttributes, 'class', Arr::get($selectAttributes, 'class') . ' ui-select');
    ?>
    <select name="<?php echo e($name); ?>" class='form-select select2_google_fonts_picker'>
        <?php
            $field['options'] = config('core.base.general.google_fonts', []);

            $customGoogleFonts = config('core.base.general.custom_google_fonts');

            if ($customGoogleFonts) {
                $field['options'] = array_merge($field['options'], explode(',', $customGoogleFonts));
            }
        ?>
        <?php $__currentLoopData = ['' => __('-- Select --')] + array_combine($field['options'], $field['options']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value='<?php echo e($key); ?>' <?php if($key == $selected): ?> selected <?php endif; ?>><?php echo e($value); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <svg class="svg-next-icon svg-next-icon-size-16">
        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#select-chevron"></use>
    </svg>
</div>

<?php if (! $__env->hasRenderedOnce('553d59f4-d854-4ae6-889e-941a60aa9e0b')): $__env->markAsRenderedOnce('553d59f4-d854-4ae6-889e-941a60aa9e0b'); ?>
    <?php $__env->startPush('footer'); ?>
        <link href="<?php echo e(BaseHelper::getGoogleFontsURL()); ?>/css?family=<?php echo e(implode('|', array_map('urlencode', array_filter($field['options'])))); ?>&display=swap" rel="stylesheet" type="text/css">
    <?php $__env->stopPush(); ?>
<?php endif; ?>

<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/core/base/resources/views/forms/partials/google-fonts.blade.php ENDPATH**/ ?>