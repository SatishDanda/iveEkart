<div class="row cart-item">
    <div class="col-3">
        <div class="checkout-product-img-wrapper">
            <img class="item-thumb img-thumbnail img-rounded" src="<?php echo e(Arr::get($cartItem->options, 'image')); ?>" alt="<?php echo e($product->original_product->name); ?>">
            <span class="checkout-quantity"><?php echo e($cartItem->qty); ?></span>
        </div>
    </div>
    <div class="col-5">
        <p class="mb-0"><?php echo e($product->original_product->name); ?> <?php if($product->isOutOfStock()): ?> <span class="stock-status-label">(<?php echo $product->stock_status_html; ?>)</span> <?php endif; ?></p>
        <p class="mb-0">
            <small><?php echo e($product->variation_attributes); ?></small>
        </p>
        <?php if($options = Arr::get($cartItem->options, 'extras', [])): ?>
            <?php if(is_array($options)): ?>
                <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($option['key']) && !empty($option['value'])): ?>
                        <p class="mb-0">
                            <small><?php echo e($option['key']); ?>: <strong> <?php echo e($option['value']); ?></strong></small>
                        </p>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endif; ?>
        <?php if(!empty($cartItem->options['options'])): ?>
            <?php echo render_product_options_info($cartItem->options['options'], $product, true); ?>

        <?php endif; ?>
    </div>
    <div class="col-4 text-end">
        <p><?php echo e(format_price($cartItem->price)); ?></p>
    </div> 
</div> <!--  /item -->
<!-- V1::eArbor page Added For Devlivery Slots -->
<?php echo $__env->make('custom/product/delivery-slot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/orders/checkout/product.blade.php ENDPATH**/ ?>