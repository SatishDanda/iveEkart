<?php if(setting('payment_paypal_status') == 1): ?>
    <li class="list-group-item">
        <input class="magic-radio js_payment_method" type="radio" name="payment_method" id="payment_paypal"
               <?php if($selecting == PAYPAL_PAYMENT_METHOD_NAME): ?> checked <?php endif; ?>
               value="paypal" data-bs-toggle="collapse" data-bs-target=".payment_paypal_wrap" data-toggle="collapse" data-target=".payment_paypal_wrap" data-parent=".list_payment_method">
        <label for="payment_paypal" class="text-start"><?php echo e(setting('payment_paypal_name', trans('plugins/payment::payment.payment_via_paypal'))); ?></label>
        <div class="payment_paypal_wrap payment_collapse_wrap collapse <?php if($selecting == PAYPAL_PAYMENT_METHOD_NAME): ?> show <?php endif; ?>" style="padding: 15px 0;">
            <p><?php echo BaseHelper::clean(setting('payment_paypal_description')); ?></p>

            <?php $supportedCurrencies = (new \Botble\Paypal\Services\Gateways\PayPalPaymentService)->supportedCurrencyCodes(); ?>
            <?php if(function_exists('get_application_currency') && !in_array(get_application_currency()->title, $supportedCurrencies) && !get_application_currency()->replicate()->where('title', 'USD')->exists()): ?>
                <div class="alert alert-warning" style="margin-top: 15px;">
                    <?php echo e(__(":name doesn't support :currency. List of currencies supported by :name: :currencies.", ['name' => 'PayPal', 'currency' => get_application_currency()->title, 'currencies' => implode(', ', $supportedCurrencies)])); ?>


                    <div style="margin-top: 10px;">
                        <?php echo e(__('Learn more')); ?>: <a href="https://developer.paypal.com/docs/api/reference/currency-codes" target="_blank" rel="nofollow">https://developer.paypal.com/docs/api/reference/currency-codes</a>
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
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/paypal/resources/views/methods.blade.php ENDPATH**/ ?>