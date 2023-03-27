<div class="checkout-discount-section" <?php if(session()->has('applied_coupon_code')): ?> style="display: none;" <?php endif; ?>>
    <a href="#" class="btn-open-coupon-form"><?php echo e(__('You have a coupon code?')); ?></a>
</div>
<div class="coupon-wrapper" <?php if(!session()->has('applied_coupon_code')): ?> style="display: none;" <?php endif; ?>>
    <?php if(!session()->has('applied_coupon_code')): ?>
        <?php echo $__env->make('plugins/ecommerce::themes.discounts.partials.apply-coupon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('plugins/ecommerce::themes.discounts.partials.remove-coupon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div>
<div class="clearfix"></div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/themes/discounts/partials/form.blade.php ENDPATH**/ ?>