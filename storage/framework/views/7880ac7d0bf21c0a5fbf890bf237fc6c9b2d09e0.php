<div class="ps-section--shopping pt-40">
    <div class="container">
        <div class="ps-section__header">
            <h1><?php echo e(__('Wishlist')); ?></h1>
        </div>
        <div class="ps-section__content">
            <?php if($products->total()): ?>
                <div class="table-responsive">
                    <table class="table ps-table--wishlist ps-table--responsive">
                        <thead>
                        <tr>
                            <th></th>
                            <th class="text-left"><?php echo e(__('Image')); ?></th>
                            <th class="text-left"><?php echo e(__('Price')); ?></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td data-label="<?php echo e(__('Remove')); ?>">&nbsp;<a class="js-remove-from-wishlist-button" href="#" data-url="<?php echo e(route('public.wishlist.remove', $product->id)); ?>"><i class="icon-cross"></i></a></td>
                                    <td data-label="<?php echo e(__('Product')); ?>">
                                        <div class="ps-product--cart">
                                            <div class="ps-product__thumbnail"><a href="<?php echo e($product->original_product->url); ?>"><img src="<?php echo e(RvMedia::getImageUrl($product->image, 'thumb', false, RvMedia::getDefaultImage())); ?>" alt="<?php echo e($product->name); ?>"></a></div>
                                            <div class="ps-product__content">
                                                <a href="<?php echo e($product->original_product->url); ?>"><?php echo BaseHelper::clean($product->name); ?></a>
                                                <?php if(EcommerceHelper::isReviewEnabled()): ?>
                                                    <?php $countRating = $product->reviews()->count(); ?>
                                                    <?php if($countRating > 0): ?>
                                                        <div class="rating_wrap">
                                                            <div class="rating">
                                                                <div class="product_rate" style="width: <?php echo e($product->reviews()->avg('star') * 20); ?>%"></div>
                                                            </div>
                                                            <span class="rating_num">(<?php echo e($countRating); ?>)</span>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="price" data-label="<?php echo e(__('Price')); ?>"><span><?php echo e(format_price($product->front_sale_price_with_taxes)); ?></span> <?php if($product->front_sale_price !== $product->price): ?> <del><?php echo e(format_price($product->price_with_taxes)); ?> </del> <?php endif; ?></td>
                                    <?php if(EcommerceHelper::isCartEnabled()): ?>
                                        <td data-label="<?php echo e(__('Action')); ?>">
                                            <div class="ps-product p-0 border-0">
                                                <div class="ps-product__actions mw-100 justify-content-end">
                                                    <a class="ps-btn add-to-cart-button" data-id="<?php echo e($product->id); ?>" href="#" data-url="<?php echo e(route('public.cart.add-to-cart')); ?>"><?php echo e(__('Add to cart')); ?></a>
                                                </div>
                                            </div>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                    <div class="ps-pagination">
                        <?php echo $products->links(); ?>

                    </div>
                </div>
            <?php else: ?>
                <p class="text-center"><?php echo e(__('No product in wishlist!')); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/views/ecommerce/wishlist.blade.php ENDPATH**/ ?>