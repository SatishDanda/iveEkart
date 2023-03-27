<?php if(get_payment_setting('status', RAZORPAY_PAYMENT_METHOD_NAME) == 1): ?>
    <li class="list-group-item">
        <input class="magic-radio js_payment_method" type="radio" name="payment_method" id="payment_<?php echo e(RAZORPAY_PAYMENT_METHOD_NAME); ?>"
               value="<?php echo e(RAZORPAY_PAYMENT_METHOD_NAME); ?>" data-bs-toggle="collapse" data-bs-target=".payment_<?php echo e(RAZORPAY_PAYMENT_METHOD_NAME); ?>_wrap"
               data-toggle="collapse" data-target=".payment_<?php echo e(RAZORPAY_PAYMENT_METHOD_NAME); ?>_wrap"
               data-parent=".list_payment_method"
               <?php if($selecting == RAZORPAY_PAYMENT_METHOD_NAME): ?> checked <?php endif; ?>
        >
        <label for="payment_<?php echo e(RAZORPAY_PAYMENT_METHOD_NAME); ?>"><?php echo e(get_payment_setting('name', RAZORPAY_PAYMENT_METHOD_NAME)); ?></label>
        <div class="payment_<?php echo e(RAZORPAY_PAYMENT_METHOD_NAME); ?>_wrap payment_collapse_wrap collapse <?php if($selecting == RAZORPAY_PAYMENT_METHOD_NAME): ?> show <?php endif; ?>">
            <?php if($errorMessage): ?>
                <div class="text-danger my-2">
                    <?php echo BaseHelper::clean($errorMessage); ?>

                </div>
            <?php else: ?>
                <p><?php echo get_payment_setting('description', RAZORPAY_PAYMENT_METHOD_NAME, __('Payment with Razorpay')); ?></p>
            <?php endif; ?>

            <?php $supportedCurrencies = (new \Botble\Razorpay\Services\Gateways\RazorpayPaymentService)->supportedCurrencyCodes(); ?>
            <?php if(!in_array(get_application_currency()->title, $supportedCurrencies)): ?>
                <div class="alert alert-warning" style="margin-top: 15px;">
                    <?php echo e(__(":name doesn't support :currency. List of currencies supported by :name: :currencies.", ['name' => 'Razorpay', 'currency' => get_application_currency()->title, 'currencies' => implode(', ', $supportedCurrencies)])); ?>


                    <div style="margin-top: 10px;">
                        <?php echo e(__('Learn more')); ?>: <a href="https://razorpay.com/docs/payments/payments/international-payments/#supported-currencies" target="_blank" rel="nofollow">https://razorpay.com/docs/payments/payments/international-payments/#supported-currencies</a>
                    </div>

                    <?php
                        $currencies = get_all_currencies()
                            ->filter(function ($item) use ($supportedCurrencies) {
                                return in_array($item->title, $supportedCurrencies);
                            });
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
        <input type="hidden" id="rzp_order_id" value="<?php echo e($orderId); ?>">
    </li>

    <?php if(EcommerceHelper::isValidToProcessCheckout()): ?>
        <script>
            $(document).ready(function () {

                var validatedFormFields = () => {
                    var addressId = $('#address_id').val();
                    if (addressId && addressId !== 'new') {
                        return true;
                    }

                    var validated = true;
                    $.each($(document).find('.address-control-item-required'), (index, el) => {
                        if (!$(el).val()) {
                            validated = false;
                        }
                    });

                    return validated;
                }

                $('.payment-checkout-form').on('submit', function (e) {
                    if (validatedFormFields() && $('input[name=payment_method]:checked').val() === 'razorpay' && !$('input[name=razorpay_payment_id]').val()) {
                        e.preventDefault();
                    }
                });

                var loadExternalScript = function(path) {
                    var result = $.Deferred(),
                        script = document.createElement('script');

                    script.async = 'async';
                    script.type = 'text/javascript';
                    script.src = path;
                    script.onload = script.onreadystatechange = function(_, isAbort) {
                        if (!script.readyState || /loaded|complete/.test(script.readyState)) {
                            if (isAbort) {
                                result.reject();
                            }
                            else {
                                result.resolve();
                            }
                        }
                    };

                    script.onerror = function() {
                        result.reject();
                    };

                    $('head')[0].appendChild(script);

                    return result.promise();
                }

                var callRazorPayScript = function() {
                    loadExternalScript('https://checkout.razorpay.com/v1/checkout.js').then(function() {

                        var options = {
                            key: '<?php echo e(get_payment_setting('key', RAZORPAY_PAYMENT_METHOD_NAME)); ?>',
                            name: '<?php echo e($name); ?>',
                            description: '<?php echo e($name); ?>',
                            order_id: $('#rzp_order_id').val(),
                            handler: function (transaction) {
                                var form = $('.payment-checkout-form');
                                form.append($('<input type="hidden" name="razorpay_payment_id">').val(transaction.razorpay_payment_id));
                                form.append($('<input type="hidden" name="razorpay_order_id">').val(transaction.razorpay_order_id));
                                form.append($('<input type="hidden" name="razorpay_signature">').val(transaction.razorpay_signature));
                                form.submit();
                            },
                            'prefill': {
                                'name': $('#address_name').val(),
                                'email': $('#address_email').val(),
                                'contact': $('#address_phone').val()
                            },
                        };

                        window.rzpay = new Razorpay(options);
                        rzpay.open();
                    });
                }

                $(document).off('click', '.payment-checkout-btn').on('click', '.payment-checkout-btn', function (event) {
                    event.preventDefault();

                    var _self = $(this);
                    var form = _self.closest('form');
                    if (validatedFormFields()) {
                        _self.attr('disabled', 'disabled');
                        var submitInitialText = _self.html();
                        _self.html('<i class="fa fa-gear fa-spin"></i> ' + _self.data('processing-text'));

                        var method = $('input[name=payment_method]:checked').val();

                        if (method === 'stripe' && $('.stripe-card-wrapper').length > 0) {
                            Stripe.setPublishableKey($('#payment-stripe-key').data('value'));
                            Stripe.card.createToken(form, function (status, response) {
                                if (response.error) {
                                    if (typeof Botble != 'undefined') {
                                        Botble.showError(response.error.message, _self.data('error-header'));
                                    } else {
                                        alert(response.error.message);
                                    }
                                    _self.removeAttr('disabled');
                                    _self.html(submitInitialText);
                                } else {
                                    form.append($('<input type="hidden" name="stripeToken">').val(response.id));
                                    form.submit();
                                }
                            });
                        } else if (method === 'razorpay') {

                            callRazorPayScript();

                            _self.removeAttr('disabled');
                            _self.html(submitInitialText);
                        } else {
                            form.submit();
                        }
                    } else {
                        form.submit();
                    }
                });
            });
        </script>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/razorpay/resources/views/methods.blade.php ENDPATH**/ ?>