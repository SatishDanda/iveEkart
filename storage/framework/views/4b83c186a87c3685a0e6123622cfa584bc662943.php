<li class="dropdown dropdown-extended dropdown-inbox">
    <a href="javascript:;" class="dropdown-toggle dropdown-header-name" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-shopping-cart"></i>
        <span class="badge badge-default"> <?php echo e($orders->total()); ?> </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-right">
        <li class="external">
            <h3><?php echo trans('plugins/ecommerce::order.new_order_notice', ['count' => $orders->total()]); ?></h3>
            <a href="<?php echo e(route('orders.index')); ?>"><?php echo e(trans('plugins/ecommerce::order.view_all')); ?></a>
        </li>
        <li>
            <ul class="dropdown-menu-list scroller" style="height: <?php echo e($orders->total() * 70); ?>px;" data-handle-color="#637283">
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo e(route('orders.edit', $order->id)); ?>">
                            <span class="photo">
                                <img src="<?php echo e($order->user->id ? $order->user->avatar_url : $order->address->avatar_url); ?>" class="rounded-circle" alt="<?php echo e($order->address->name); ?>">
                            </span>
                            <span class="subject"><span class="from"> <?php echo e($order->address->name ?: $order->user->name); ?> </span><span class="time"><?php echo e($order->created_at->toDateTimeString()); ?> </span></span>
                            <span class="message"> <?php echo e($order->address->phone ? $order->address->phone . ' - ' : null); ?> <?php echo e($order->address->email ?: $order->user->email); ?> </span>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if($orders->total() > 10): ?>
                    <li class="text-center"><a href="<?php echo e(route('orders.index')); ?>"><?php echo e(trans('plugins/ecommerce::order.view_all')); ?></a></li>
                <?php endif; ?>
            </ul>
        </li>
    </ul>
</li>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/orders/notification.blade.php ENDPATH**/ ?>