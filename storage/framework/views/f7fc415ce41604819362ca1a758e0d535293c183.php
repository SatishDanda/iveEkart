<?php if(get_payment_setting('status', SSLCOMMERZ_PAYMENT_METHOD_NAME) == 1): ?>
    <li class="list-group-item">
        <input class="magic-radio js_payment_method" type="radio" name="payment_method" id="payment_<?php echo e(SSLCOMMERZ_PAYMENT_METHOD_NAME); ?>"
               value="<?php echo e(SSLCOMMERZ_PAYMENT_METHOD_NAME); ?>" data-bs-toggle="collapse" data-bs-target=".payment_<?php echo e(SSLCOMMERZ_PAYMENT_METHOD_NAME); ?>_wrap"
               data-toggle="collapse" data-target=".payment_<?php echo e(SSLCOMMERZ_PAYMENT_METHOD_NAME); ?>_wrap"
               data-parent=".list_payment_method"
               <?php if($selecting == SSLCOMMERZ_PAYMENT_METHOD_NAME): ?> checked <?php endif; ?>
        >
        <label for="payment_<?php echo e(SSLCOMMERZ_PAYMENT_METHOD_NAME); ?>"><?php echo e(get_payment_setting('name', SSLCOMMERZ_PAYMENT_METHOD_NAME)); ?></label>
        <div class="payment_<?php echo e(SSLCOMMERZ_PAYMENT_METHOD_NAME); ?>_wrap payment_collapse_wrap collapse <?php if($selecting == SSLCOMMERZ_PAYMENT_METHOD_NAME): ?> show <?php endif; ?>">
            <p><?php echo get_payment_setting('description', SSLCOMMERZ_PAYMENT_METHOD_NAME, __('The largest payment gateway aggregator in Bangladesh and a pioneer in the FinTech industry since 2010')); ?></p>
        </div>
    </li>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/sslcommerz/resources/views/methods.blade.php ENDPATH**/ ?>