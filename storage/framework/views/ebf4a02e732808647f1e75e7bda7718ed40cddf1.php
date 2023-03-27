<div class="input-group color-picker" data-color="<?php echo e($value ?? '#000'); ?>">
    <?php echo Form::text($name, $value ?? '#000', array_merge(['class' => 'form-control'], $attributes)); ?>

    <span class="input-group-text">
    <span class="input-group-text colorpicker-input-addon"><i></i></span>
  </span>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/core/base/resources/views/forms/partials/color.blade.php ENDPATH**/ ?>