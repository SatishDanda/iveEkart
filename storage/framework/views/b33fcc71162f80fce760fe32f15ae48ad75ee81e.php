<div class="order-customer-info">
    <h3> <?php echo e(__('Customer information')); ?></h3>
    <?php if($order->address->id): ?>
        <?php if($order->address->name): ?>
            <p>
                <span class="d-inline-block"><?php echo e(__('Full name')); ?>:</span>
                <span class="order-customer-info-meta"><?php echo e($order->address->name); ?></span>
            </p>
        <?php endif; ?>

        <?php if($order->address->phone): ?>
            <p>
                <span class="d-inline-block"><?php echo e(__('Phone')); ?>:</span>
                <span class="order-customer-info-meta"><?php echo e($order->address->phone); ?></span>
            </p>
        <?php endif; ?>

        <?php if($order->address->email): ?>
            <p>
                <span class="d-inline-block"><?php echo e(__('Email')); ?>:</span>
                <span class="order-customer-info-meta"><?php echo e($order->address->email); ?></span>
            </p>
        <?php endif; ?>

        <?php if($order->full_address): ?>
            <p>
                <span class="d-inline-block"><?php echo e(__('Address')); ?>:</span>
                <span class="order-customer-info-meta"><?php echo e($order->full_address); ?></span>
            </p>
        <?php endif; ?>
    <?php endif; ?>

    <?php if(!empty($isShowShipping)): ?>
        <p>
            <span class="d-inline-block"><?php echo e(__('Shipping method')); ?>:</span>
            <span class="order-customer-info-meta"><?php echo e($order->shipping_method_name); ?> - <?php echo e(format_price($order->shipping_amount)); ?></span>
        </p>
    <?php endif; ?>
    <p>
        <span class="d-inline-block"><?php echo e(__('Payment method')); ?>:</span>
        <span class="order-customer-info-meta"><?php echo e($order->payment->payment_channel->label()); ?></span>
    </p>
    <p>
        <span class="d-inline-block"><?php echo e(__('Payment status')); ?>:</span>
        <span class="order-customer-info-meta" style="text-transform: uppercase"><?php echo $order->payment->status->toHtml(); ?></span>
    </p>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/orders/thank-you/customer-info.blade.php ENDPATH**/ ?>