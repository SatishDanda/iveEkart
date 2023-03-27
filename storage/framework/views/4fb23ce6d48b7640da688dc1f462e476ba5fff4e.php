<div class="form-group form-group-no-margin <?php if($errors->has($name)): ?> has-error <?php endif; ?>">
    <div class="multi-choices-widget list-item-checkbox">
        <?php if(isset($options['choices']) && (is_array($options['choices']) || $options['choices'] instanceof \Illuminate\Support\Collection)): ?>
            <?php echo $__env->make('plugins/ecommerce::product-categories.partials.categories-checkbox-option-line', [
                'categories' => $options['choices'],
                'value'      => $options['value'],
                'currentId'  => null,
                'name'       => $name
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/product-categories/partials/categories-multi.blade.php ENDPATH**/ ?>