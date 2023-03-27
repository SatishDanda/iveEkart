<?php $__env->startSection('content'); ?>
    <div class="section-header">
        <h3><?php echo e(SeoHelper::getTitle()); ?></h3>
    </div>
    <div class="section-content">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo e(__('ID number')); ?></th>
                        <th><?php echo e(__('Order ID number')); ?></th>
                        <th><?php echo e(__('Items Count')); ?></th>
                        <th><?php echo e(__('Date')); ?></th>
                        <th><?php echo e(__('Status')); ?></th>
                        <th><?php echo e(__('Actions')); ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php if(count($requests) > 0): ?>
                    <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e(get_order_code($item->id)); ?></th>
                            <th scope="row"><a href="<?php echo e(route('customer.orders.view', $item->order_id)); ?>" title="Click to show detail"><?php echo e(get_order_code($item->order_id)); ?></a></th>
                            <th scope="row"><?php echo e($item->items_count); ?></th>
                            <td><?php echo e($item->created_at->translatedFormat('M d, Y h:m')); ?></td>
                            <td><?php echo BaseHelper::clean($item->return_status->toHtml()); ?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="<?php echo e(route('customer.order_returns.detail', $item->id)); ?>"><?php echo e(__('View')); ?></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center"><?php echo e(__('No order return requests!')); ?></td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="pagination">
            <?php echo $requests->links(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.customers.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/views/ecommerce/customers/order-returns/list.blade.php ENDPATH**/ ?>