<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($category->id); ?>"><?php echo BaseHelper::clean($indent); ?><?php echo e($category->name); ?></option>
    <?php if($category->activeChildren->count()): ?>
        <?php echo Theme::partial('product-categories-select', ['categories' => $category->activeChildren, 'indent' => $indent . '&nbsp;&nbsp;']); ?>

    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/partials/product-categories-select.blade.php ENDPATH**/ ?>