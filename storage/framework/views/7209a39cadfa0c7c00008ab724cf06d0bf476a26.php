<?php
/**
 * @var string $value
 */
$value = isset($value) ? (array)$value : [];
?>
<?php if($categories): ?>
    <ul>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($category->id != $currentId): ?>
                <li value="<?php echo e($category->id ?? ''); ?>"
                        <?php echo e($category->id == $value ? 'selected' : ''); ?>>
                    <?php echo Form::customCheckbox([
                        [
                            $name, $category->id, $category->name, in_array($category->id, $value),
                        ]
                    ]); ?>

                    <?php echo $__env->make('plugins/ecommerce::product-categories.partials.categories-checkbox-option-line', [
                        'categories' => $category->child_cats,
                        'value'      => $value,
                        'currentId'  => $currentId,
                        'name'       => $name
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/product-categories/partials/categories-checkbox-option-line.blade.php ENDPATH**/ ?>