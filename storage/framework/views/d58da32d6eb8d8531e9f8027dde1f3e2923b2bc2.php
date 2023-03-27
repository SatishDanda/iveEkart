<div class="table">
    <table>
        <tr>
            <th style="text-align: left">
                <?php echo e(trans('plugins/ecommerce::products.product_image')); ?>

            </th>
            <th style="text-align: left">
                <?php echo e(trans('plugins/ecommerce::products.product_name')); ?>

            </th>
        </tr>

        <?php $__currentLoopData = $order->digitalProducts(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <img src="<?php echo e(RvMedia::getImageUrl($orderProduct->product_image, 'thumb')); ?>" alt="<?php echo e($orderProduct->product_image); ?>" width="50">
                </td>
                <td>
                    <span><?php echo e($orderProduct->product_image); ?></span>
                </td>
                <td>
                    <a href="<?php echo e($orderProduct->download_hash_url); ?>"><?php echo e(__('Download')); ?></a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table><br>
</div>

<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/emails/partials/digital-product-list.blade.php ENDPATH**/ ?>