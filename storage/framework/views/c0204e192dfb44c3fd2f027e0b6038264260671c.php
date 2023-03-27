<div class="form-group mb-3">
    <label for="widget-name"><?php echo e(trans('core/base::forms.name')); ?></label>
    <input type="text" class="form-control" name="name" value="<?php echo e($config['name']); ?>">
</div>
<div class="form-group mb-3">
    <label for="content"><?php echo e(trans('core/base::forms.content')); ?></label>
    <textarea name="content" class="form-control" rows="7"><?php echo e($config['content']); ?></textarea>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/packages/widget/resources/views/widgets/text/backend.blade.php ENDPATH**/ ?>