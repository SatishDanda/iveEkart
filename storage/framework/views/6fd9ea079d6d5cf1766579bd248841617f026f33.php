<?php if($products->count()): ?>
    <div class="ps-panel__content">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="ps-product ps-product--wide ps-product--search-result">
                <div class="ps-product__thumbnail">
                    <a href="<?php echo e($product->url); ?>">
                        <img src="<?php echo e(RvMedia::getImageUrl($product->image, 'small', false, RvMedia::getDefaultImage())); ?>" alt="<?php echo e($product->name); ?>">
                    </a>
                </div>
                    <div class="ps-product__content">
                    <a class="ps-product__title" href="<?php echo e($product->url); ?>"><?php echo BaseHelper::clean($product->name); ?></a>
                    <?php if(EcommerceHelper::isReviewEnabled()): ?>
                        <?php if($product->reviews_avg > 0): ?>
                            <div class="rating_wrap">
                                <div class="rating">
                                    <div class="product_rate" style="width: <?php echo e($product->reviews_avg * 20); ?>%"></div>
                                </div>
                                <span class="rating_num">(<?php echo e($product->reviews_count); ?>)</span>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <p class="ps-product__price <?php if($product->front_sale_price !== $product->price): ?> sale <?php endif; ?>"><?php echo e(format_price($product->front_sale_price_with_taxes)); ?> <?php if($product->front_sale_price !== $product->price): ?> <del><?php echo e(format_price($product->price_with_taxes)); ?> </del> <?php endif; ?></p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="ps-panel__footer text-center"><a href="<?php echo e(route('public.products')); ?>?q=<?php echo e($query); ?>"><?php echo e(__('See all results')); ?></a></div>
<?php else: ?>
    <div class="text-center"><?php echo e(__('No products found.')); ?></a></div>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/partials/ajax-search-results.blade.php ENDPATH**/ ?>