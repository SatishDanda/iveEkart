<?php if(get_payment_setting('status', PAYSTACK_PAYMENT_METHOD_NAME) == 1): ?>
    <li class="list-group-item">
        <input class="magic-radio js_payment_method" type="radio" name="payment_method" id="payment_<?php echo e(PAYSTACK_PAYMENT_METHOD_NAME); ?>"
               value="<?php echo e(PAYSTACK_PAYMENT_METHOD_NAME); ?>" data-bs-toggle="collapse" data-bs-target=".payment_<?php echo e(PAYSTACK_PAYMENT_METHOD_NAME); ?>_wrap"
               data-toggle="collapse" data-target=".payment_<?php echo e(PAYSTACK_PAYMENT_METHOD_NAME); ?>_wrap"
               data-parent=".list_payment_method"
               <?php if($selecting == PAYSTACK_PAYMENT_METHOD_NAME): ?> checked <?php endif; ?>
        >
        <label for="payment_<?php echo e(PAYSTACK_PAYMENT_METHOD_NAME); ?>"><?php echo e(get_payment_setting('name', PAYSTACK_PAYMENT_METHOD_NAME)); ?></label>
        <div class="payment_<?php echo e(PAYSTACK_PAYMENT_METHOD_NAME); ?>_wrap payment_collapse_wrap collapse <?php if($selecting == PAYSTACK_PAYMENT_METHOD_NAME): ?> show <?php endif; ?>">
            <p><?php echo BaseHelper::clean(get_payment_setting('description', PAYSTACK_PAYMENT_METHOD_NAME, __('Payment with Paystack'))); ?></p>

            <?php $supportedCurrencies = (new \Botble\Paystack\Services\Gateways\PaystackPaymentService)->supportedCurrencyCodes(); ?>
            <?php if(!in_array(get_application_currency()->title, $supportedCurrencies)): ?>
                <div class="alert alert-warning" style="margin-top: 15px;">
                    <?php echo e(__(":name doesn't support :currency. List of currencies supported by :name: :currencies.", ['name' => 'Paystack', 'currency' => get_application_currency()->title, 'currencies' => implode(', ', $supportedCurrencies)])); ?>

                    <div style="margin-top: 10px;">
                        <?php echo e(__('Learn more')); ?>: <a href="https://support.paystack.com/hc/en-us/articles/360009973779" target="_blank" rel="nofollow">https://support.paystack.com/hc/en-us/articles/360009973779</a>
                    </div>
                    <?php
                        $currencies = get_all_currencies();

                        $currencies = $currencies->filter(function ($item) use ($supportedCurrencies) { return in_array($item->title, $supportedCurrencies); });
                    ?>
                    <?php if(count($currencies)): ?>
                        <div style="margin-top: 10px;"><?php echo e(__('Please switch currency to any supported currency')); ?>:&nbsp;&nbsp;
                            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('public.change-currency', $currency->title)); ?>" <?php if(get_application_currency_id() == $currency->id): ?> class="active" <?php endif; ?>><span><?php echo e($currency->title); ?></span></a>
                                <?php if(!$loop->last): ?>
                                    &nbsp; | &nbsp;
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </li>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/paystack/resources/views/methods.blade.php ENDPATH**/ ?>