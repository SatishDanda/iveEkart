<?php echo $__env->make('plugins/ecommerce::orders.thank-you.total-row', [
    'label' => __('Subtotal'),
    'value' => format_price($order->sub_total)
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if($order->shipping_method->getValue()): ?>
    <?php echo $__env->make('plugins/ecommerce::orders.thank-you.total-row', [
            'label' =>  __('Shipping fee') . ($order->is_free_shipping ? ' <small>(' . __('Using coupon code') . ': <strong>' . $order->coupon_code . '</strong>)</small>' : ''),
            'value' => $order->shipping_method_name . ' - ' . format_price($order->shipping_amount)
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if($order->discount_amount !== null): ?>
    <?php echo $__env->make('plugins/ecommerce::orders.thank-you.total-row', [
        'label' => __('Discount'),
        'value' => format_price($order->discount_amount) . ($order->coupon_code ? ' <small>(' . __('Using coupon code') . ': <strong>' . $order->coupon_code . '</strong>)</small>' : ''),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if(EcommerceHelper::isTaxEnabled()): ?>
    <?php echo $__env->make('plugins/ecommerce::orders.thank-you.total-row', [
        'label' => __('Tax'),
        'value' => format_price($order->tax_amount)
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<hr>

<div class="row">
    <div class="col-6">
        <p><?php echo e(__('Total')); ?>:</p>
    </div>
    <div class="col-6 float-end">
        <p class="total-text raw-total-text"> <?php echo e(format_price($order->amount)); ?> </p>
    </div>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/orders/thank-you/total-info.blade.php ENDPATH**/ ?>