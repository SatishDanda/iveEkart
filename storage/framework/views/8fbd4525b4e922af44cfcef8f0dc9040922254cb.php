<div class="onoffswitch">
    <input type="hidden" name="<?php echo e($name); ?>" value="0" <?php echo Html::attributes($attributes); ?>>
    <input type="checkbox" name="<?php echo e($name); ?>" class="onoffswitch-checkbox" id="<?php echo e($name); ?>" value="1" <?php if($value): ?> checked <?php endif; ?> <?php echo Html::attributes($attributes); ?>>
    <label class="onoffswitch-label" for="<?php echo e($name); ?>">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/core/base/resources/views/forms/partials/on-off.blade.php ENDPATH**/ ?>