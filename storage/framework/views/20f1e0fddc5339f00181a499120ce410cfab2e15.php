<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($order->store): ?>
        <div>
            <span>
                <?php echo app('translator')->get('plugins/marketplace::store.forms.store'); ?> : <?php echo e($order->store->name); ?>

            </span>
        </div>
    <?php endif; ?>
    <?php echo $__env->make('plugins/ecommerce::emails.partials.order-detail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/marketplace/resources/views/emails/partials/order-detail.blade.php ENDPATH**/ ?>