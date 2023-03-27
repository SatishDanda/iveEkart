<?php if($product): ?>
    <div class="ps-product__thumbnail">
        <a href="<?php echo e($product->url); ?>">
            <img src="<?php echo e(RvMedia::getImageUrl($product->image, 'small', false, RvMedia::getDefaultImage())); ?>" alt="<?php echo e($product->name); ?>">
        </a>
        <?php if($product->isOutOfStock()): ?>
            <div class="ps-product__badges">
                <span class="ps-product__badge out-stock"><?php echo e(__('Out Of Stock')); ?></span>
            </div>
        <?php else: ?>
            <?php if($product->productLabels->count()): ?>
                <div class="ps-product__badges">
                    <?php $__currentLoopData = $product->productLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="ps-product__badge" <?php if($label->color): ?> style="background-color: <?php echo e($label->color); ?>" <?php endif; ?>><?php echo e($label->name); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <?php if($product->front_sale_price !== $product->price): ?>
                    <div class="ps-product__badges">
                        <div class="ps-product__badge"><?php echo e(get_sale_percentage($product->price, $product->front_sale_price)); ?></div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
        <ul class="ps-product__actions">
            <?php if(EcommerceHelper::isCartEnabled()): ?>
                <li><a class="add-to-cart-button" data-id="<?php echo e($product->id); ?>" href="#" data-url="<?php echo e(route('public.cart.add-to-cart')); ?>" title="<?php echo e(__('Add To Cart')); ?>"><i class="icon-bag2"></i></a></li>
            <?php endif; ?>
            <li><a class="js-quick-view-button" href="#" data-url="<?php echo e(route('public.ajax.quick-view', $product->id)); ?>" title="<?php echo e(__('Quick View')); ?>"><i class="icon-eye"></i></a></li>
            <?php if(EcommerceHelper::isWishlistEnabled()): ?>
                <li><a class="js-add-to-wishlist-button" href="#" data-url="<?php echo e(route('public.wishlist.add', $product->id)); ?>" title="<?php echo e(__('Add to Wishlist')); ?>"><i class="icon-heart"></i></a></li>
            <?php endif; ?>
            <?php if(EcommerceHelper::isCompareEnabled()): ?>
                <li><a class="js-add-to-compare-button" href="#" data-url="<?php echo e(route('public.compare.add', $product->id)); ?>" title="<?php echo e(__('Compare')); ?>"><i class="icon-chart-bars"></i></a></li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="ps-product__container">
        <?php if(is_plugin_active('marketplace') && $product->store->id): ?>
            <a class="ps-product__vendor" href="<?php echo e($product->store->url); ?>"><?php echo e($product->store->name); ?></a>
        <?php endif; ?>
        <div class="ps-product__content">
            <a class="ps-product__title" href="<?php echo e($product->url); ?>"><?php echo BaseHelper::clean($product->name); ?></a>
            <?php if(EcommerceHelper::isReviewEnabled()): ?>
                <div class="rating_wrap">
                    <div class="rating">
                        <div class="product_rate" style="width: <?php echo e($product->reviews_avg * 20); ?>%"></div>
                    </div>
                    <span class="rating_num">(<?php echo e($product->reviews_count); ?>)</span>
                </div>
            <?php endif; ?>
            <?php echo apply_filters('ecommerce_before_product_price_in_listing', null, $product); ?>

            <p class="ps-product__price <?php if($product->front_sale_price !== $product->price): ?> sale <?php endif; ?>"><?php echo e(format_price($product->front_sale_price_with_taxes)); ?> <?php if($product->front_sale_price !== $product->price): ?> <del><?php echo e(format_price($product->price_with_taxes)); ?> </del> <?php endif; ?></p>
            <?php echo apply_filters('ecommerce_after_product_price_in_listing', null, $product); ?>

        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/partials/product-item.blade.php ENDPATH**/ ?>