<?php $__currentLoopData = $productAttributeSets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeSet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <label>
        <input type="checkbox" class="attribute-set-item" name="attribute_sets[]" value="<?php echo e($attributeSet->id); ?>" <?php echo e($attributeSet->is_selected ? 'checked' : ''); ?>>
        <?php echo e($attributeSet->title); ?>

    </label> &nbsp;
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/products/partials/attribute-sets.blade.php ENDPATH**/ ?>