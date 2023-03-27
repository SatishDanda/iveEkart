<div class="row promo coupon coupon-section" >
    <div class="col-lg-8 col-md-8 col-8">
        <input type="text" name="coupon_code" class="form-control coupon-code input-md checkout-input" value="<?php echo e(old('coupon_code')); ?>" placeholder="<?php echo e(__('Enter coupon code...')); ?>">
        <div class="coupon-error-msg">
            <span class="text-danger"></span>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-4 text-end">
        <button class="btn btn-md btn-gray btn-info apply-coupon-code float-end" data-url="<?php echo e(route('public.coupon.apply')); ?>" type="button" style="margin-top: 0;padding: 10px 20px;><i class="><i class="fa fa-gift"></i> <?php echo e(__('Apply')); ?></button>
    </div>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/themes/discounts/partials/apply-coupon.blade.php ENDPATH**/ ?>