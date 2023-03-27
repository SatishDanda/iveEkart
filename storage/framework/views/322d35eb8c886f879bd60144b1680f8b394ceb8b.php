<?php
    $allowThumb = Arr::get($attributes, 'allow_thumb', true);
    $defaultImage = Arr::get($attributes, 'default_image', RvMedia::getDefaultImage());
?>
<div class="image-box">
    <input type="hidden" name="<?php echo e($name); ?>" value="<?php echo e($value); ?>" class="image-data">
    <div class="preview-image-wrapper <?php if(!$allowThumb): ?> preview-image-wrapper-not-allow-thumb <?php endif; ?>">
        <img src="<?php echo e(RvMedia::getImageUrl($value, $allowThumb ? 'thumb' : null, false, $defaultImage)); ?>"
            data-default="<?php echo e($defaultImage); ?>"
            alt="<?php echo e(trans('core/base::base.preview_image')); ?>"
            class="preview_image" <?php if($allowThumb): ?> width="150" <?php endif; ?>>
        <a class="btn_remove_image" title="<?php echo e(trans('core/base::forms.remove_image')); ?>">
            <i class="fa fa-times"></i>
        </a>
    </div>
    <div class="image-box-actions">
        <a href="#" class="btn_gallery" data-result="<?php echo e($name); ?>"
            data-action="<?php echo e($attributes['action'] ?? 'select-image'); ?>" data-allow-thumb="<?php echo e($allowThumb == true); ?>">
            <?php echo e(trans('core/base::forms.choose_image')); ?>

        </a>
    </div>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/core/base/resources/views/forms/partials/image.blade.php ENDPATH**/ ?>