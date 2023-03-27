<?php $__env->startSection('title'); ?>
    <?php echo e(__('Checkout')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php if(Cart::instance('cart')->count() > 0): ?>
        <?php echo $__env->make('plugins/payment::partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo Form::open(['route' => ['public.checkout.process', $token], 'class' => 'checkout-form payment-checkout-form', 'id' => 'checkout-form']); ?>

            <input type="hidden" name="checkout-token" id="checkout-token" value="<?php echo e($token); ?>">

            <div class="container" id="main-checkout-product-info">
                <div class="row">
                    <div class="order-1 order-md-2 col-lg-5 col-md-6 right">
                        <div class="d-block d-sm-none">
                            <?php echo $__env->make('plugins/ecommerce::orders.partials.logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div id="cart-item" class="position-relative">

                            <div class="payment-info-loading" style="display: none;">
                                <div class="payment-info-loading-content">
                                    <i class="fas fa-spinner fa-spin"></i>
                                </div>
                            </div>

                            <?php echo apply_filters(RENDER_PRODUCTS_IN_CHECKOUT_PAGE, $products); ?>


                            <div class="mt-2 p-2">
                                <div class="row">
                                    <div class="col-6">
                                        <p><?php echo e(__('Subtotal')); ?>:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="price-text sub-total-text text-end"> <?php echo e(format_price(Cart::instance('cart')->rawSubTotal())); ?> </p>
                                    </div>
                                </div>
                                <?php if(session('applied_coupon_code')): ?>
                                    <div class="row coupon-information">
                                        <div class="col-6">
                                            <p><?php echo e(__('Coupon code')); ?>:</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="price-text coupon-code-text"> <?php echo e(session('applied_coupon_code')); ?> </p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if($couponDiscountAmount > 0): ?>
                                    <div class="row price discount-amount">
                                        <div class="col-6">
                                            <p><?php echo e(__('Coupon code discount amount')); ?>:</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="price-text total-discount-amount-text"> <?php echo e(format_price($couponDiscountAmount)); ?> </p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if($promotionDiscountAmount > 0): ?>
                                    <div class="row">
                                        <div class="col-6">
                                            <p><?php echo e(__('Promotion discount amount')); ?>:</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="price-text"> <?php echo e(format_price($promotionDiscountAmount)); ?> </p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($shipping) && Arr::get($sessionCheckoutData, 'is_available_shipping', true)): ?>
                                    <div class="row">
                                        <div class="col-6">
                                            <p><?php echo e(__('Shipping fee')); ?>:</p>
                                        </div>
                                        <div class="col-6 float-end">
                                            <p class="price-text shipping-price-text"><?php echo e(format_price($shippingAmount)); ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if(EcommerceHelper::isTaxEnabled()): ?>
                                    <div class="row">
                                        <div class="col-6">
                                            <p><?php echo e(__('Tax')); ?>:</p>
                                        </div>
                                        <div class="col-6 float-end">
                                            <p class="price-text tax-price-text"><?php echo e(format_price(Cart::instance('cart')->rawTax())); ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="row">
                                    <div class="col-6">
                                        <p><strong><?php echo e(__('Total')); ?></strong>:</p>
                                    </div>
                                    <div class="col-6 float-end">
                                        <p class="total-text raw-total-text"
                                        data-price="<?php echo e(format_price(Cart::instance('cart')->rawTotal(), null, true)); ?>"> <?php echo e(($promotionDiscountAmount + $couponDiscountAmount - $shippingAmount) > Cart::instance('cart')->rawTotal() ? format_price(0) : format_price(Cart::instance('cart')->rawTotal() - $promotionDiscountAmount - $couponDiscountAmount + $shippingAmount)); ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="mt-3 mb-5">
                            <?php echo $__env->make('plugins/ecommerce::themes.discounts.partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 left">
                        <div class="d-none d-sm-block">
                            <?php echo $__env->make('plugins/ecommerce::orders.partials.logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="form-checkout">
                            <?php if($isShowAddressForm): ?>
                                <div>
                                    <h5 class="checkout-payment-title"><?php echo e(__('Shipping information')); ?></h5>
                                    <input type="hidden" value="<?php echo e(route('public.checkout.save-information', $token)); ?>" id="save-shipping-information-url">
                                    <?php echo $__env->make('plugins/ecommerce::orders.partials.address-form', compact('sessionCheckoutData'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <br>
                            <?php endif; ?>

                            <?php if(EcommerceHelper::isBillingAddressEnabled()): ?>
                                <div>
                                    <h5 class="checkout-payment-title"><?php echo e(__('Billing information')); ?></h5>
                                    <?php echo $__env->make('plugins/ecommerce::orders.partials.billing-address-form', compact('sessionCheckoutData'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <br>
                            <?php endif; ?> 
                            

                            <?php if(! is_plugin_active('marketplace')): ?>
                                <?php if(Arr::get($sessionCheckoutData, 'is_available_shipping', true)): ?>
                                    <div id="shipping-method-wrapper">
                                        <h5 class="checkout-payment-title"><?php echo e(__('Shipping method')); ?></h5>
                                        <div class="shipping-info-loading" style="display: none;">
                                            <div class="shipping-info-loading-content">
                                                <i class="fas fa-spinner fa-spin"></i>
                                            </div>
                                        </div> 
                                
                                        <?php if(!empty($shipping)): ?>
                                            <div class="payment-checkout-form">
                                                <input type="hidden" name="shipping_option" value="<?php echo e(old('shipping_option', $defaultShippingOption)); ?>" required>
                                                <ul class="list-group list_payment_method">
                                                    <?php $__currentLoopData = $shipping; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shippingKey => $shippingItems): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php $__currentLoopData = $shippingItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shippingOption => $shippingItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo $__env->make('plugins/ecommerce::orders.partials.shipping-option', [
                                                                'shippingItem' => $shippingItem,
                                                                'attributes' =>[
                                                                    'id' => 'shipping-method-' . $shippingKey . '-' . $shippingOption,
                                                                    'name' => 'shipping_method',
                                                                    'class' => 'magic-radio',
                                                                    'checked' => old('shipping_method', $defaultShippingMethod) == $shippingKey && old('shipping_option', $defaultShippingOption) == $shippingOption,
                                                                    'disabled' => Arr::get($shippingItem, 'disabled'),
                                                                    'data-option' => $shippingOption,
                                                                ],
                                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        <?php else: ?>
                                            <p style="color:red;"> <?php echo e(__('No shipping methods available!')); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <br>
                                <?php endif; ?>
                            <?php endif; ?>

                            

                            <div class="position-relative">
                                <div class="payment-info-loading" style="display: none;">
                                    <div class="payment-info-loading-content">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </div>
                                </div>
                                <h5 class="checkout-payment-title"><?php echo e(__('Payment method')); ?></h5>
                                <input type="hidden" name="amount" value="<?php echo e(($promotionDiscountAmount + $couponDiscountAmount - $shippingAmount) > Cart::instance('cart')->rawTotal() ? 0 : format_price(Cart::instance('cart')->rawTotal() - $promotionDiscountAmount - $couponDiscountAmount + $shippingAmount, null, true)); ?>">
                                <input type="hidden" name="currency" value="<?php echo e(strtoupper(get_application_currency()->title)); ?>">
                                <?php echo apply_filters(PAYMENT_FILTER_PAYMENT_PARAMETERS, null); ?>

                                <ul class="list-group list_payment_method">
                                    <?php
                                        $selected = session('selected_payment_method');
                                        $default = \Botble\Payment\Supports\PaymentHelper::defaultPaymentMethod();
                                        $selecting = $selected ?: $default;
                                    ?>

                                    <?php echo apply_filters(PAYMENT_FILTER_ADDITIONAL_PAYMENT_METHODS, null, [
                                            'amount'    => ($promotionDiscountAmount + $couponDiscountAmount - $shippingAmount) > Cart::instance('cart')->rawTotal() ? 0 : format_price(Cart::instance('cart')->rawTotal() - $promotionDiscountAmount - $couponDiscountAmount + $shippingAmount, null, true),
                                            'currency'  => strtoupper(get_application_currency()->title),
                                            'name'      => null,
                                            'selected'  => $selected,
                                            'default'   => $default,
                                            'selecting' => $selecting,
                                        ]); ?>


                                    <?php if(get_payment_setting('status', 'cod') == 1): ?>
                                        <li class="list-group-item">
                                            <input class="magic-radio js_payment_method" type="radio" name="payment_method" id="payment_cod"
                                                <?php if($selecting == \Botble\Payment\Enums\PaymentMethodEnum::COD): ?> checked <?php endif; ?>
                                                value="cod" data-bs-toggle="collapse" data-bs-target=".payment_cod_wrap" data-parent=".list_payment_method">
                                            <label for="payment_cod" class="text-start"><?php echo e(setting('payment_cod_name', trans('plugins/payment::payment.payment_via_cod'))); ?></label>
                                            <div class="payment_cod_wrap payment_collapse_wrap collapse <?php if($selecting == \Botble\Payment\Enums\PaymentMethodEnum::COD): ?> show <?php endif; ?>" style="padding: 15px 0;">
                                                <?php echo BaseHelper::clean(setting('payment_cod_description')); ?>


                                                <?php $minimumOrderAmount = setting('payment_cod_minimum_amount', 0); ?>
                                                <?php if($minimumOrderAmount > Cart::instance('cart')->rawSubTotal()): ?>
                                                    <div class="alert alert-warning" style="margin-top: 15px;">
                                                        <?php echo e(__('Minimum order amount to use COD (Cash On Delivery) payment method is :amount, you need to buy more :more to place an order!', ['amount' => format_price($minimumOrderAmount), 'more' => format_price($minimumOrderAmount - Cart::instance('cart')->rawSubTotal())])); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </li>
                                    <?php endif; ?>

                                    <?php if(get_payment_setting('status', 'bank_transfer') == 1): ?>
                                        <li class="list-group-item">
                                            <input class="magic-radio js_payment_method" type="radio" name="payment_method" id="payment_bank_transfer"
                                                <?php if($selecting == \Botble\Payment\Enums\PaymentMethodEnum::BANK_TRANSFER): ?> checked <?php endif; ?>
                                                value="bank_transfer"
                                                data-bs-toggle="collapse" data-bs-target=".payment_bank_transfer_wrap" data-parent=".list_payment_method">
                                            <label for="payment_bank_transfer" class="text-start"><?php echo e(setting('payment_bank_transfer_name', trans('plugins/payment::payment.payment_via_bank_transfer'))); ?></label>
                                            <div class="payment_bank_transfer_wrap payment_collapse_wrap collapse <?php if($selecting == \Botble\Payment\Enums\PaymentMethodEnum::BANK_TRANSFER): ?> show <?php endif; ?>" style="padding: 15px 0;">
                                                <?php echo BaseHelper::clean(setting('payment_bank_transfer_description')); ?>

                                            </div>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>

                            <br>

                            <div class="form-group mb-3 <?php if($errors->has('description')): ?> has-error <?php endif; ?>">
                                <label for="description" class="control-label"><?php echo e(__('Order notes')); ?></label>
                                <br>
                                <textarea name="description" id="description" rows="3" class="form-control" placeholder="<?php echo e(__('Notes about your order, e.g. special notes for delivery.')); ?>"><?php echo e(old('description')); ?></textarea>
                                <?php echo Form::error('description', $errors); ?>

                            </div>

                            <?php if(EcommerceHelper::getMinimumOrderAmount() > Cart::instance('cart')->rawSubTotal()): ?>
                                <div class="alert alert-warning">
                                    <?php echo e(__('Minimum order amount is :amount, you need to buy more :more to place an order!', ['amount' => format_price(EcommerceHelper::getMinimumOrderAmount()), 'more' => format_price(EcommerceHelper::getMinimumOrderAmount() - Cart::instance('cart')->rawSubTotal())])); ?>

                                </div>
                            <?php endif; ?>

                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-6 d-none d-md-block" style="line-height: 53px">
                                        <a class="text-info" href="<?php echo e(route('public.cart')); ?>"><i class="fas fa-long-arrow-alt-left"></i> <span class="d-inline-block back-to-cart"><?php echo e(__('Back to cart')); ?></span></a>
                                    </div>
                                    <div class="col-md-6 checkout-button-group">
                                        <?php if(EcommerceHelper::isValidToProcessCheckout()): ?>
                                            <button type="submit" class="btn payment-checkout-btn payment-checkout-btn-step float-end" data-processing-text="<?php echo e(__('Processing. Please wait...')); ?>" data-error-header="<?php echo e(__('Error')); ?>">
                                                <?php echo e(__('Checkout')); ?>

                                            </button>
                                        <?php else: ?>
                                            <span class="btn payment-checkout-btn-step float-end disabled">
                                                <?php echo e(__('Checkout')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="d-block d-md-none back-to-cart-button-group">
                                    <a class="text-info" href="<?php echo e(route('public.cart')); ?>"><i class="fas fa-long-arrow-alt-left"></i> <span class="d-inline-block"><?php echo e(__('Back to cart')); ?></span></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <?php echo Form::close(); ?>


        <?php echo $__env->make('plugins/payment::partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-warning my-5">
                        <span><?php echo __('No products in cart. :link!', ['link' => Html::link(route('public.index'), __('Back to shopping'))]); ?></span>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/core/core/base/libraries/intl-tel-input/css/intlTelInput.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('footer'); ?>
    <script src="<?php echo e(asset('vendor/core/core/base/libraries/intl-tel-input/js/intlTelInput.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/core/core/base/js/phone-number-field.js')); ?>"></script>
   
    <?php
        Assets::addScripts(['form-validation']);
    ?>

    <!-- V1::eArbor Add two scripts for validation check L:300 -->
    
    <script src="<?php echo e(asset('custom/js/validationplugin.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/js/checkoutvalidation.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('plugins/ecommerce::orders.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/orders/checkout.blade.php ENDPATH**/ ?>