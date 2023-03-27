<div class="ps-product-list mt-40 mb-40">
    <div class="ps-container">
        <div class="ps-section__header">
            <h3><?php echo BaseHelper::clean($title); ?></h3>
            <ul class="ps-section__links">
                <li><a href="<?php echo e(route('public.products')); ?>"><?php echo e(__('View All')); ?></a></li>
            </ul>
        </div>
        <featured-products-component url="<?php echo e(route('public.ajax.featured-products')); ?>" limit="<?php echo e($limit); ?>"></featured-products-component>
    </div>
</div>

<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/partials/short-codes/featured-products.blade.php ENDPATH**/ ?>