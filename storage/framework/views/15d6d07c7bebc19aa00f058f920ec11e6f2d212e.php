<?php if(!$order->dont_show_order_info_in_product_list): ?>
    <a href="<?php echo e(route('public.orders.tracking', ['order_id' => $order->code, 'email' => $order->user->email ?: $order->address->email])); ?>"
        class="button button-blue"><?php echo e(trans('plugins/ecommerce::email.view_order')); ?></a>
        <?php echo trans('plugins/ecommerce::email.link_go_to_our_shop', ['link' => route('public.index')]); ?>


    <br />

    <h3><?php echo e(trans('plugins/ecommerce::email.order_information')); ?></h3>

    <br>

    <p><?php echo trans('plugins/ecommerce::email.order_number', ['order_id' => $order->code]); ?></p>
<?php endif; ?>
<div class="table">
    <table>
        <tr>
            <th style="text-align: left">
                <?php echo e(trans('plugins/ecommerce::products.product_image')); ?>

            </th>
            <th style="text-align: left">
                <?php echo e(trans('plugins/ecommerce::products.form.product')); ?>

            </th>
            <th style="text-align: left">
                <?php echo e(trans('plugins/ecommerce::products.form.price')); ?>

            </th>
            <th style="text-align: left">
                <?php echo e(trans('plugins/ecommerce::products.form.quantity')); ?>

            </th>
            <th style="text-align: left">
                <?php echo e(trans('plugins/ecommerce::products.form.total')); ?>

            </th>
        </tr>

        <?php $__currentLoopData = ($products ?? $order->products); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $product = get_products([
                    'condition' => [
                        'ec_products.id'     => $orderProduct->product_id,
                    ],
                    'take'      => 1,
                    'select'    => [
                        'ec_products.id',
                        'ec_products.name',
                        'ec_products.price',
                        'ec_products.sale_price',
                        'ec_products.sale_type',
                        'ec_products.start_date',
                        'ec_products.end_date',
                        'ec_products.sku',
                        'ec_products.is_variation',
                        'ec_products.status',
                        'ec_products.order',
                        'ec_products.created_at',
                        'ec_products.images',
                    ],
                ]);
            ?>
            <tr>
                <td>
                    <img src="<?php echo e(RvMedia::getImageUrl($orderProduct->product_image, 'thumb')); ?>" alt="<?php echo e($orderProduct->product_name); ?>" width="50">
                </td>
                <td>
                    <?php echo e($orderProduct->product_name); ?>

                    <?php if($product): ?>
                        <small><?php echo e($product->variation_attributes); ?></small>
                    <?php endif; ?>

                    <?php if(!empty($orderProduct->options) && is_array($orderProduct->options)): ?>
                        <?php $__currentLoopData = $orderProduct->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($option['key']) && !empty($option['value'])): ?>
                                <p class="mb-0"><small><?php echo e($option['key']); ?>: <strong> <?php echo e($option['value']); ?></strong></small></p>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </td>

                <td>
                    <?php echo e(format_price($orderProduct->price)); ?>

                </td>

                <td>
                    x <?php echo e($orderProduct->qty); ?>

                </td>

                <td>
                    <?php echo e(format_price($orderProduct->qty * $orderProduct->price)); ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if(!$order->dont_show_order_info_in_product_list): ?>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                    <?php echo e(trans('plugins/ecommerce::products.form.sub_total')); ?>

                </td>
                <td>
                    <?php echo e(format_price($order->sub_total)); ?>

                </td>
            </tr>

            <?php if(EcommerceHelper::isTaxEnabled()): ?>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><?php echo e(trans('plugins/ecommerce::products.form.tax')); ?>

                    </td>
                    <td>
                        <?php echo e(format_price($order->tax_amount)); ?>

                    </td>
                </tr>
            <?php endif; ?>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><?php echo e(trans('plugins/ecommerce::products.form.shipping_fee')); ?>

                </td>
                <td>
                    <?php echo e(format_price($order->shipping_amount)); ?>

                </td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><?php echo e(trans('plugins/ecommerce::products.form.discount')); ?>

                </td>
                <td>
                    <?php echo e(format_price($order->discount_amount)); ?>

                </td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>

                <td><h3><?php echo e(trans('plugins/ecommerce::products.form.total')); ?></h3></td>
                <td>
                    <h3><?php echo e(format_price($order->amount)); ?></h3>
                </td>
            </tr>
        <?php endif; ?>
    </table><br>
</div>

<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/emails/partials/order-detail.blade.php ENDPATH**/ ?>