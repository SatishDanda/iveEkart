<div class="ps-section--shopping ps-shopping-cart pt-40">
    <div class="container">
        <div class="ps-section__header">
            <h1><?php echo e(__('Shopping Cart')); ?></h1>
        </div>
        <div class="ps-section__content">
            <form class="form--shopping-cart" method="post" action="<?php echo e(route('public.cart.update')); ?>">
                <?php echo csrf_field(); ?>
                    <?php if(count($products) > 0): ?>
                            <div class="table-responsive">
                                <table class="table ps-table--shopping-cart">
                                    <thead>
                                    <tr>
                                        <th><?php echo e(__("Product's name")); ?></th>
                                        <th><?php echo e(__('Price')); ?></th>
                                        <th><?php echo e(__('Quantity')); ?></th>
                                        <th><?php echo e(__('Total')); ?></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = Cart::instance('cart')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $product = $products->find($cartItem->id);
                                            ?>

                                            <?php if(!empty($product)): ?>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="items[<?php echo e($key); ?>][rowId]" value="<?php echo e($cartItem->rowId); ?>">
                                                        <div class="ps-product--cart">
                                                            <div class="ps-product__thumbnail">
                                                                <a href="<?php echo e($product->original_product->url); ?>">
                                                                    <img src="<?php echo e($cartItem->options['image']); ?>" alt="<?php echo e($product->original_product->name); ?>" />
                                                                </a>
                                                            </div>
                                                            <div class="ps-product__content">
                                                                <a href="<?php echo e($product->original_product->url); ?>"><?php echo e($product->original_product->name); ?>  <?php if($product->isOutOfStock()): ?> <span class="stock-status-label">(<?php echo $product->stock_status_html; ?>)</span> <?php endif; ?></a>
                                                                <?php if(is_plugin_active('marketplace') && $product->original_product->store->id): ?>
                                                                    <p class="d-block mb-0 sold-by"><small><?php echo e(__('Sold by')); ?>: <a
                                                                                href="<?php echo e($product->original_product->store->url); ?>"><?php echo e($product->original_product->store->name); ?></a></small></p>
                                                                <?php endif; ?>

                                                                <p class="mb-0"><small><?php echo e($cartItem->options['attributes'] ?? ''); ?></small></p>

                                                                <?php if(!empty($cartItem->options['options'])): ?>
                                                                    <?php echo render_product_options_info($cartItem->options['options'], $product, true); ?>

                                                                <?php endif; ?>

                                                                <?php if(!empty($cartItem->options['extras']) && is_array($cartItem->options['extras'])): ?>
                                                                    <?php $__currentLoopData = $cartItem->options['extras']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if(!empty($option['key']) && !empty($option['value'])): ?>
                                                                            <p class="mb-0"><small><?php echo e($option['key']); ?>: <strong> <?php echo e($option['value']); ?></strong></small></p>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="price text-center">
                                                        <div class="product__price <?php if($product->front_sale_price != $product->price): ?> sale <?php endif; ?>">
                                                            <span><?php echo e(format_price($cartItem->price)); ?></span>
                                                            <?php if($product->front_sale_price != $product->price): ?>
                                                                <small><del><?php echo e(format_price($product->price)); ?></del></small>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="form-group--number product__qty">
                                                            <button class="up">+</button>
                                                            <button class="down">-</button>
                                                            <input type="number" class="form-control qty-input" min="1" value="<?php echo e($cartItem->qty); ?>" title="<?php echo e(__('Qty')); ?>" name="items[<?php echo e($key); ?>][values][qty]">
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><?php echo e(format_price($cartItem->price * $cartItem->qty)); ?></td>
                                                    <td><a href="#" data-url="<?php echo e(route('public.cart.remove', $cartItem->rowId)); ?>" class="remove-cart-button"><i class="icon-cross"></i></a></td>
                                                </tr>
                                                <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                    <?php else: ?>
                        <p class="text-center"><?php echo e(__('Your cart is empty!')); ?></p>
                    <?php endif; ?>
                </form>
        </div>
        <?php if(count($products) > 0): ?>
            <div class="ps-section__footer">
                <div class="row">
                    <div class="col-lg-6 col-md-12 form-coupon-wrapper">
                        <figure>
                            <figcaption><?php echo e(__('Coupon Discount')); ?></figcaption>
                            <div class="form-group">
                                <input class="form-control coupon-code" type="text" name="coupon_code" value="<?php echo e(old('coupon_code')); ?>" placeholder="<?php echo e(__('Enter coupon code')); ?>">
                            </div>
                            <div class="form-group">
                                <button class="ps-btn ps-btn--outline btn-apply-coupon-code" type="button" data-url="<?php echo e(route('public.coupon.apply')); ?>"><?php echo e(__('Apply')); ?></button>
                            </div>
                        </figure>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 ">
                        <div class="ps-block--shopping-total">
                            <div class="ps-block__header">
                                <p><?php echo e(__('Subtotal')); ?> <span> <?php echo e(format_price(Cart::instance('cart')->rawSubTotal())); ?></span></p>
                            </div>
                            <?php if(EcommerceHelper::isTaxEnabled()): ?>
                                <div class="ps-block__header">
                                    <p><?php echo e(__('Tax')); ?> <span> <?php echo e(format_price(Cart::instance('cart')->rawTax())); ?></span></p>
                                </div>
                            <?php endif; ?>
                            <?php if($couponDiscountAmount > 0 && session('applied_coupon_code')): ?>
                                <div class="ps-block__header">
                                    <p><?php echo e(__('Coupon code: :code', ['code' => session('applied_coupon_code')])); ?> (<small><a class="btn-remove-coupon-code text-danger" data-url="<?php echo e(route('public.coupon.remove')); ?>" href="javascript:void(0)" data-processing-text="<?php echo e(__('Removing...')); ?>"><?php echo e(__('Remove')); ?></a></small>)<span> <?php echo e(format_price($couponDiscountAmount)); ?></span></p>
                                </div>
                            <?php endif; ?>
                            <?php if($promotionDiscountAmount): ?>
                                <div class="ps-block__header">
                                    <p><?php echo e(__('Discount promotion')); ?> <span> <?php echo e(format_price($promotionDiscountAmount)); ?></span></p>
                                </div>
                            <?php endif; ?>
                            <div class="ps-block__content">
                                <h3><?php echo e(__('Total')); ?> <span><?php echo e(($promotionDiscountAmount + $couponDiscountAmount) > Cart::instance('cart')->rawTotal() ? format_price(0) : format_price(Cart::instance('cart')->rawTotal() - $promotionDiscountAmount - $couponDiscountAmount)); ?></span></h3>
                                <p><small>(<?php echo e(__('Shipping fees not included')); ?>)</small></p>
                            </div>
                        </div>
                        <a class="ps-btn btn-cart-button-action" href="<?php echo e(route('public.products')); ?>"><i class="icon-arrow-left"></i> <?php echo e(__('Back to Shop')); ?></a>
                        <a class="ps-btn ps-btn btn-cart-button-action" href="<?php echo e(route('public.checkout.information', OrderHelper::getOrderSessionToken())); ?>"><?php echo e(__('Proceed to checkout')); ?> <i class="icon-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php echo Theme::partial('cross-sell-products', compact('crossSellProducts')); ?>

    </div>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/views/ecommerce/cart.blade.php ENDPATH**/ ?>