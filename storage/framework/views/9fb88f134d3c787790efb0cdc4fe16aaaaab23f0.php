<?php if($order->shipment && $order->shipment->note): ?>
    <p><strong><?php echo e(__('Delivery Notes:')); ?></strong></p>
    <p style="color: #17a2b8 !important"><?php echo e($order->shipment->note); ?></p>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/emails/partials/order-delivery-notes.blade.php ENDPATH**/ ?>