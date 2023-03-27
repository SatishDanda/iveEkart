<div class="shipment-info-panel hide-print">
    <div class="shipment-info-header">
        <a target="_blank" href="<?php echo e(route('ecommerce.shipments.edit', $shipment->id)); ?>">
            <h4><?php echo e(get_shipment_code($shipment->id)); ?></h4>
        </a>
        <span class="label carrier-status carrier-status-<?php echo e($shipment->status); ?>"><?php echo e($shipment->status->label()); ?></span>
    </div>

    <div class="pd-all-20 pt10">
        <div class="flexbox-grid-form flexbox-grid-form-no-outside-padding rps-form-767 pt10">
            <div class="flexbox-grid-form-item ws-nm">
                <span><?php echo e(trans('plugins/ecommerce::shipping.shipping_method')); ?>: <span><i><?php echo e($shipment->order->shipping_method_name); ?></i></span></span>
            </div>
            <div class="flexbox-grid-form-item rps-no-pd-none-r ws-nm">
                <span><?php echo e(trans('plugins/ecommerce::shipping.weight_unit', ['unit' => ecommerce_weight_unit()])); ?>:</span> <span><i><?php echo e($shipment->weight); ?> <?php echo e(ecommerce_weight_unit()); ?></i></span>
            </div>
        </div>
        <div class="flexbox-grid-form flexbox-grid-form-no-outside-padding rps-form-767 pt10">
            <div class="flexbox-grid-form-item ws-nm">
                <span><?php echo e(trans('plugins/ecommerce::shipping.updated_at')); ?>:</span> <span><i><?php echo e($shipment->updated_at); ?></i></span>
            </div>
            <?php if((float)$shipment->cod_amount): ?>
                <div class="flexbox-grid-form-item ws-nm rps-no-pd-none-r">
                    <span><?php echo e(trans('plugins/ecommerce::shipping.cod_amount')); ?>:</span>
                    <span><i><?php echo e(format_price($shipment->cod_amount)); ?></i></span>
                </div>
            <?php endif; ?>
        </div>

        <?php if($shipment->note): ?>
            <div class="flexbox-grid-form flexbox-grid-form-no-outside-padding rps-form-767 pt10">
                <div class="flexbox-grid-form-item ws-nm rps-no-pd-none-r">
                    <span><?php echo e(trans('plugins/ecommerce::shipping.delivery_note')); ?>:</span>
                    <strong><i><?php echo e($shipment->note); ?></i></strong>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php if($shipment->status != \Botble\Ecommerce\Enums\ShippingStatusEnum::CANCELED): ?>
        <div class="panel-heading order-bottom shipment-actions-wrapper">
            <div class="flexbox-grid-default">
                <div class="flexbox-content">
                    <?php if(in_array($shipment->status, [\Botble\Ecommerce\Enums\ShippingStatusEnum::NOT_APPROVED, \Botble\Ecommerce\Enums\ShippingStatusEnum::APPROVED])): ?>
                        <button type="button" class="btn btn-secondary btn-destroy btn-cancel-shipment" data-action="<?php echo e(route('orders.cancel-shipment', $shipment->id)); ?>"><?php echo e(trans('plugins/ecommerce::shipping.cancel_shipping')); ?></button>
                    <?php endif; ?>

                    <button class="btn btn-info ml10 btn-trigger-update-shipping-status"><i class="fas fa-shipping-fast"></i> <?php echo e(trans('plugins/ecommerce::shipping.update_shipping_status')); ?></button>

                    <?php echo apply_filters('shipment_buttons_detail_order', null, $shipment); ?>


                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/orders/shipment-detail.blade.php ENDPATH**/ ?>