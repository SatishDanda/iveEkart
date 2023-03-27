<header class="header header--product" data-sticky="true">
    <nav class="navigation">
        <div class="container">
            <article class="ps-product--header-sticky">
                <div class="ps-product__thumbnail">
                    <img src="<?php echo e(RvMedia::getImageUrl($product->image, 'small', false, RvMedia::getDefaultImage())); ?>" alt="<?php echo e($product->name); ?>">
                </div>
                <div class="ps-product__wrapper">
                    <div class="ps-product__content"><a class="ps-product__title" href="<?php echo e($product->url); ?>"><?php echo BaseHelper::clean($product->name); ?></a>
                        <ul class="ps-tab-list">
                            <li class="active"><a href="#tab-description"><?php echo e(__('Description')); ?></a></li>
                            <?php if(EcommerceHelper::isReviewEnabled()): ?>
                                <li><a href="#tab-reviews"><?php echo e(__('Reviews')); ?> (<?php echo e($product->reviews_count); ?>)</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="ps-product__shopping">
                        <span class="ps-product__price">
                            <span><?php echo e(format_price($product->front_sale_price_with_taxes)); ?></span>
                            <?php if($product->front_sale_price !== $product->price): ?>
                                <del><?php echo e(format_price($product->price_with_taxes)); ?></del>
                            <?php endif; ?>
                        </span>
                        <?php if(EcommerceHelper::isCartEnabled()): ?>
                            <button class="ps-btn add-to-cart-button <?php if($product->isOutOfStock()): ?> btn-disabled <?php endif; ?>" type="button" name="add_to_cart" value="1"><?php echo e(__('Add to cart')); ?></button>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
        </div>
    </nav>
</header>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/partials/header-product-page.blade.php ENDPATH**/ ?>