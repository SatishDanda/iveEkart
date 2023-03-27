<?php if(count($productCollections)): ?>
    <div class="ps-product-list mb-60">
        <product-collections-component title="<?php echo BaseHelper::clean($title); ?>" :product_collections="<?php echo e(json_encode($productCollections)); ?>" url="<?php echo e(route('public.ajax.products')); ?>" all="<?php echo e(route('public.products')); ?>"></product-collections-component>
    </div>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/partials/short-codes/product-collections.blade.php ENDPATH**/ ?>