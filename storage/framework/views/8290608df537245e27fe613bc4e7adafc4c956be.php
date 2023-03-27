<?php if(count($crossSellProducts) > 0): ?>
    <div class="ps-section--default ps-customer-bought mt-60">
        <div class="ps-section__header text-left pb-0 mb-4">
            <h3 class="mb-2"><?php echo e(__('Customers who bought this item also bought')); ?></h3>
        </div>
        <div class="ps-section__content">
            <div class="row">
                <?php
                    $crossSellProducts->loadMissing(['productLabels']);
                    if (is_plugin_active('marketplace')) {
                        $crossSellProducts->loadMissing(['store', 'store.slugable']);
                    }
                ?>
                <?php $__currentLoopData = $crossSellProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crossSellProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="ps-product">
                            <?php echo Theme::partial('product-item', ['product' => $crossSellProduct]); ?>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/partials/cross-sell-products.blade.php ENDPATH**/ ?>