<?php if(empty($object)): ?>
    <div class="form-group mb-3 <?php if($errors->has('slug')): ?> has-error <?php endif; ?>">
        <?php echo Form::permalink('slug', old('slug'), 0, $prefix, [], true, get_class($object)); ?>

        <?php echo Form::error('slug', $errors); ?>

    </div>
<?php else: ?>
    <div class="form-group mb-3 <?php if($errors->has('slug')): ?> has-error <?php endif; ?>">
        <?php echo Form::permalink('slug', $object->slug, $object->slug_id, $prefix, SlugHelper::canPreview(get_class($object)) && $object->status != \Botble\Base\Enums\BaseStatusEnum::PUBLISHED, [], true, get_class($object)); ?>

        <?php echo Form::error('slug', $errors); ?>

    </div>
<?php endif; ?>
<input type="hidden" name="model" value="<?php echo e(get_class($object)); ?>">
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/packages/slug/resources/views/partials/slug.blade.php ENDPATH**/ ?>