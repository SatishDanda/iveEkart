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
    </div>
    <div class="ps-product__container">
        <div class="ps-product__content">
            <a class="ps-product__title" href="<?php echo e($product->url); ?>"><?php echo BaseHelper::clean($product->name); ?></a>
            <?php if(is_plugin_active('marketplace') && $product->store->id): ?>
                <p class="ps-product__vendor">
                    <span><?php echo e(__('Sold by')); ?>: </span>
                    <a href="<?php echo e($product->store->url); ?>" class="text-uppercase"><?php echo e($product->store->name); ?></a>
                </p>
            <?php endif; ?>
            <?php if(EcommerceHelper::isReviewEnabled()): ?>
                <div class="rating_wrap">
                    <div class="rating">
                        <div class="product_rate" style="width: <?php echo e($product->reviews_avg * 20); ?>%"></div>
                    </div>
                    <span class="rating_num">(<?php echo e($product->reviews_count); ?>)</span>
                </div>
            <?php endif; ?>
            <div class="ps-product__desc">
                <?php echo Str::limit(clean(strip_tags($product->description)), 120); ?>

            </div>
        </div>
        <div class="ps-product__shopping">
            <?php echo apply_filters('ecommerce_before_product_price_in_listing', null, $product); ?>

            <p class="ps-product__price <?php if($product->front_sale_price !== $product->price): ?> sale <?php endif; ?>"><?php echo e(format_price($product->front_sale_price_with_taxes)); ?> <?php if($product->front_sale_price !== $product->price): ?> <del><?php echo e(format_price($product->price_with_taxes)); ?> </del> <?php endif; ?></p>
            <?php echo apply_filters('ecommerce_after_product_price_in_listing', null, $product); ?>

            <?php if(EcommerceHelper::isCartEnabled()): ?>
                <a class="ps-btn add-to-cart-button" data-id="<?php echo e($product->id); ?>" href="#" data-url="<?php echo e(route('public.cart.add-to-cart')); ?>"><?php echo e(__('Add to cart')); ?></a>
            <?php endif; ?>
            <ul class="ps-product__actions">
                <?php if(EcommerceHelper::isWishlistEnabled()): ?>
                    <li><a class="js-add-to-wishlist-button" href="#" data-url="<?php echo e(route('public.wishlist.add', $product->id)); ?>"><i class="icon-heart"></i> <?php echo e(__('Wishlist')); ?></a></li>
                <?php endif; ?>
                <?php if(EcommerceHelper::isCompareEnabled()): ?>
                    <li>
                        <a class="js-add-to-compare-button" href="#" data-url="<?php echo e(route('public.compare.add', $product->id)); ?>"><i class="icon-chart-bars"></i>
                        <?php echo e(__('Compare')); ?></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/partials/product-item-grid.blade.php ENDPATH**/ ?>