<?php $__env->startSection('title'); ?>
    <?php echo e(__('Order successfully at :site_title', ['site_title' => theme_option('site_title')])); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-12 left">

                <?php echo $__env->make('plugins/ecommerce::orders.partials.logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="thank-you">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <div class="d-inline-block">
                        <h3 class="thank-you-sentence">
                            <?php echo e(__('Your order is successfully placed')); ?>

                        </h3>
                        <p><?php echo e(__('Thank you for purchasing our products!')); ?></p>
                    </div>
                </div>

                <?php echo $__env->make('plugins/ecommerce::orders.thank-you.customer-info', ['order' => Arr::first($orders), 'isShowShipping' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <a href="<?php echo e(route('public.index')); ?>" class="btn payment-checkout-btn"> <?php echo e(__('Continue shopping')); ?> </a>
            </div>
            <!---------------------- start right column ------------------>
            <div class="col-lg-5 col-md-6 right">

                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('plugins/ecommerce::orders.thank-you.order-info', ['isShowTotalInfo' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php if(!$loop->last): ?>
                        <hr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if(count($orders) > 1): ?>
                    <hr>

                    <!-- total info -->
                    <div class="bg-light p-3">
                        <div class="row total-price">
                            <div class="col-6">
                                <p><?php echo e(__('Sub amount')); ?>:</p>
                            </div>
                            <div class="col-6">
                                <p class="text-end"> <?php echo e(format_price($orders->sum('sub_total'))); ?> </p>
                            </div>
                        </div>

                        <?php if($orders->filter(function ($order) {return $order->shipment->id;})->count()): ?>
                            <div class="row total-price">
                                <div class="col-6">
                                    <p><?php echo e(__('Shipping fee')); ?>:</p>
                                </div>
                                <div class="col-6">
                                    <p class="text-end"><?php echo e(format_price($orders->sum('shipping_amount'))); ?> </p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($orders->sum('discount_amount')): ?>
                            <div class="row total-price">
                                <div class="col-6">
                                    <p><?php echo e(__('Discount')); ?>:</p>
                                </div>
                                <div class="col-6">
                                    <p class="text-end"><?php echo e(format_price($orders->sum('discount_amount'))); ?> </p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if(EcommerceHelper::isTaxEnabled()): ?>
                            <div class="row total-price">
                                <div class="col-6">
                                    <p><?php echo e(__('Tax')); ?>:</p>
                                </div>
                                <div class="col-6">
                                    <p class="text-end"><?php echo e(format_price($orders->sum('tax_amount'))); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="row total-price">
                            <div class="col-6">
                                <p><?php echo e(__('Total amount')); ?>:</p>
                            </div>
                            <div class="col-6">
                                <p class="total-text raw-total-text text-end"> <?php echo e(format_price($orders->sum('amount'))); ?> </p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plugins/ecommerce::orders.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/marketplace/resources/views/orders/thank-you.blade.php ENDPATH**/ ?>