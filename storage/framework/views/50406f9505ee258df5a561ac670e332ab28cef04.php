<?php echo Form::open(['url' => $url]); ?>


    <div class="form-group">
        <label for="shipment-status" class="control-label"><?php echo e(trans('plugins/ecommerce::shipping.status')); ?></label>
        <?php echo Form::customSelect('status', \Botble\Ecommerce\Enums\ShippingStatusEnum::labels(), $shipment->status); ?>

    </div>

<?php echo Form::close(); ?>

<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/orders/shipping-status-modal.blade.php ENDPATH**/ ?>