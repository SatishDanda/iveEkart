<div class="row price-group">
    <input type="hidden"
           value="<?php echo e(old('sale_type', $product ? $product->sale_type : 0)); ?>"
           class="detect-schedule hidden"
           name="sale_type">

    <div class="col-md-4">
        <div class="form-group mb-3 <?php if($errors->has('sku')): ?> has-error <?php endif; ?>">
            <label class="text-title-field"><?php echo e(trans('plugins/ecommerce::products.sku')); ?></label>
            <?php echo Form::text('sku', old('sku', $product ? $product->sku : null), ['class' => 'next-input', 'id' => 'sku', 'data-counter' => 30]); ?>

        </div>
        <?php if(($isVariation && !$product) || ($product && $product->is_variation && !$product->sku)): ?>
            <div class="form-group mb-3">
                <label class="text-title-field">
                    <input type="hidden" name="auto_generate_sku" value="0">
                    <input type="checkbox" name="auto_generate_sku" value="1">
                    &nbsp;<?php echo e(trans('plugins/ecommerce::products.form.auto_generate_sku')); ?>

                </label>
            </div>
        <?php endif; ?>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-3">
            <label class="text-title-field"><?php echo e(trans('plugins/ecommerce::products.form.price')); ?></label>
            <div class="next-input--stylized">
                <span class="next-input-add-on next-input__add-on--before"><?php echo e(get_application_currency()->symbol); ?></span>
                <input name="price"
                       class="next-input input-mask-number regular-price next-input--invisible"
                       data-thousands-separator="<?php echo e(EcommerceHelper::getThousandSeparatorForInputMask()); ?>" data-decimal-separator="<?php echo e(EcommerceHelper::getDecimalSeparatorForInputMask()); ?>"
                       step="any"
                       value="<?php echo e(old('price', $product ? $product->price : ($originalProduct->price ?? 0))); ?>"
                       type="text">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label class="text-title-field">
                <span><?php echo e(trans('plugins/ecommerce::products.form.price_sale')); ?></span>
                <a href="javascript:;"
                   class="turn-on-schedule <?php if(old('sale_type', $product ? $product->sale_type : ($originalProduct->sale_type ?? 0)) == 1): ?> hidden <?php endif; ?>"><?php echo e(trans('plugins/ecommerce::products.form.choose_discount_period')); ?></a>
                <a href="javascript:;"
                   class="turn-off-schedule <?php if(old('sale_type', $product ? $product->sale_type : ($originalProduct->sale_type ?? 0)) == 0): ?> hidden <?php endif; ?>"><?php echo e(trans('plugins/ecommerce::products.form.cancel')); ?></a>
            </label>
            <div class="next-input--stylized">
                <span class="next-input-add-on next-input__add-on--before"><?php echo e(get_application_currency()->symbol); ?></span>
                <input name="sale_price"
                       class="next-input input-mask-number sale-price next-input--invisible"
                       data-thousands-separator="<?php echo e(EcommerceHelper::getThousandSeparatorForInputMask()); ?>" data-decimal-separator="<?php echo e(EcommerceHelper::getDecimalSeparatorForInputMask()); ?>"
                       value="<?php echo e(old('sale_price', $product ? $product->sale_price : ($originalProduct->sale_price ?? null))); ?>"
                       type="text">
            </div>
        </div>
    </div>
    <div class="row">
       <div class="col-md-6">
           <div class="form-group mb-3">
               <label class="text-title-field"><?php echo e(trans('plugins/ecommerce::products.form.cost_per_item')); ?></label>
               <div class="next-input--stylized">
                   <span class="next-input-add-on next-input__add-on--before"><?php echo e(get_application_currency()->symbol); ?></span>
                   <input name="cost_per_item"
                          class="next-input input-mask-number regular-price next-input--invisible"
                          step="any"
                          value="<?php echo e(old('cost_per_item', $product ? $product->cost_per_item : ($originalProduct->cost_per_item ?? 0))); ?>"
                          type="text"
                          placeholder="<?php echo e(trans('plugins/ecommerce::products.form.cost_per_item_placeholder')); ?>">
               </div>
               <?php echo Form::helper(trans('plugins/ecommerce::products.form.cost_per_item_helper')); ?>

           </div>
       </div>
        <input type="hidden" value="<?php echo e($product->id ?? null); ?>" name="product_id">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="text-title-field"><?php echo e(trans('plugins/ecommerce::products.form.barcode')); ?></label>
                <div class="next-input--stylized">
                    <input name="barcode"
                           class="next-input next-input--invisible"
                           step="any"
                           value="<?php echo e(old('barcode', $product ? $product->barcode : ($originalProduct->barcode ?? null))); ?>"
                           type="text"
                           placeholder="<?php echo e(trans('plugins/ecommerce::products.form.barcode_placeholder')); ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 scheduled-time <?php if(old('sale_type', $product ? $product->sale_type : ($originalProduct->sale_type ?? 0)) == 0): ?> hidden <?php endif; ?>">
        <div class="form-group mb-3">
            <label class="text-title-field"><?php echo e(trans('plugins/ecommerce::products.form.date.start')); ?></label>
            <input name="start_date"
                   class="next-input form-date-time"
                   value="<?php echo e(old('start_date', $product ? $product->start_date : ($originalProduct->start_date ?? null))); ?>"
                   type="text">
        </div>
    </div>
    <div class="col-md-6 scheduled-time <?php if(old('sale_type', $product ? $product->sale_type : ($originalProduct->sale_type ?? 0)) == 0): ?> hidden <?php endif; ?>">
        <div class="form-group mb-3">
            <label class="text-title-field"><?php echo e(trans('plugins/ecommerce::products.form.date.end')); ?></label>
            <input name="end_date"
                   class="next-input form-date-time"
                   value="<?php echo e(old('end_date', $product ? $product->end_date : ($originalProduct->end_date ?? null))); ?>"
                   type="text">
        </div>
    </div>
</div>

<hr/>

<div class="form-group mb-3">
    <div class="storehouse-management">
        <div class="mt5">
            <input type="hidden" name="with_storehouse_management" value="0">
            <label><input type="checkbox" class="storehouse-management-status" value="1" name="with_storehouse_management" <?php if(old('with_storehouse_management', $product ? $product->with_storehouse_management : ($originalProduct->with_storehouse_management ?? 0)) == 1): ?> checked <?php endif; ?>> <?php echo e(trans('plugins/ecommerce::products.form.storehouse.storehouse')); ?></label>
        </div>
    </div>
</div>
<div class="storehouse-info <?php if(old('with_storehouse_management', $product ? $product->with_storehouse_management : ($originalProduct->with_storehouse_management ?? 0)) == 0): ?> hidden <?php endif; ?>">
    <div class="form-group mb-3">
        <label class="text-title-field"><?php echo e(trans('plugins/ecommerce::products.form.storehouse.quantity')); ?></label>
        <input type="text"
               class="next-input input-mask-number input-medium"
               value="<?php echo e(old('quantity', $product ? $product->quantity : ($originalProduct->quantity ?? 0))); ?>"
               name="quantity">
    </div>
    <div class="form-group mb-3">
        <label class="text-title-field">
            <input type="hidden" name="allow_checkout_when_out_of_stock" value="0">
            <input type="checkbox" name="allow_checkout_when_out_of_stock" value="1"
                   <?php if(old('allow_checkout_when_out_of_stock', $product ? $product->allow_checkout_when_out_of_stock : ($originalProduct->allow_checkout_when_out_of_stock ?? 0)) == 1): ?> checked <?php endif; ?>>
            &nbsp;<?php echo e(trans('plugins/ecommerce::products.form.stock.allow_order_when_out')); ?>

        </label>
    </div>
</div>

<div class="form-group stock-status-wrapper <?php if(old('with_storehouse_management', $product ? $product->with_storehouse_management : ($originalProduct->with_storehouse_management ?? 0)) == 1): ?> hidden <?php endif; ?>">
    <label class="text-title-field"><?php echo e(trans('plugins/ecommerce::products.form.stock_status')); ?></label>
    <?php echo Form::customSelect('stock_status', \Botble\Ecommerce\Enums\StockStatusEnum::labels(), $product ? $product->stock_status : null); ?>

</div>

<hr/>

<?php if(!EcommerceHelper::isEnabledSupportDigitalProducts() ||
    (!$product && !$originalProduct && request()->input('product_type') != Botble\Ecommerce\Enums\ProductTypeEnum::DIGITAL) ||
    ($originalProduct && $originalProduct->isTypePhysical()) || ($product && $product->isTypePhysical())): ?>
<div class="shipping-management ">
    <label class="text-title-field"><?php echo e(trans('plugins/ecommerce::products.form.shipping.title')); ?></label>
    <div class="row">
        <div class="col-md-3 col-md-6">
            <div class="form-group mb-3">
                <label><?php echo e(trans('plugins/ecommerce::products.form.shipping.weight')); ?> (<?php echo e(ecommerce_weight_unit()); ?>)</label>
                <div class="next-input--stylized">
                    <span class="next-input-add-on next-input__add-on--before"><?php echo e(ecommerce_weight_unit()); ?></span>
                    <input type="text" class="next-input input-mask-number next-input--invisible" name="weight" value="<?php echo e(old('weight', $product ? $product->weight : ($originalProduct->weight ?? 0))); ?>">
                </div>
            </div>
        </div>
        <div class="col-md-3 col-md-6">
            <div class="form-group mb-3">
                <label><?php echo e(trans('plugins/ecommerce::products.form.shipping.length')); ?> (<?php echo e(ecommerce_width_height_unit()); ?>)</label>
                <div class="next-input--stylized">
                    <span class="next-input-add-on next-input__add-on--before"><?php echo e(ecommerce_width_height_unit()); ?></span>
                    <input type="text" class="next-input input-mask-number next-input--invisible" name="length" value="<?php echo e(old('length', $product ? $product->length : ($originalProduct->length ?? 0))); ?>">
                </div>
            </div>
        </div>
        <div class="col-md-3 col-md-6">
            <div class="form-group mb-3">
                <label><?php echo e(trans('plugins/ecommerce::products.form.shipping.wide')); ?> (<?php echo e(ecommerce_width_height_unit()); ?>)</label>
                <div class="next-input--stylized">
                    <span class="next-input-add-on next-input__add-on--before"><?php echo e(ecommerce_width_height_unit()); ?></span>
                    <input type="text" class="next-input input-mask-number next-input--invisible" name="wide" value="<?php echo e(old('wide', $product ? $product->wide : ($originalProduct->wide ?? 0))); ?>">
                </div>
            </div>
        </div>
        <div class="col-md-3 col-md-6">
            <div class="form-group mb-3">
                <label><?php echo e(trans('plugins/ecommerce::products.form.shipping.height')); ?> (<?php echo e(ecommerce_width_height_unit()); ?>)</label>
                <div class="next-input--stylized">
                    <span class="next-input-add-on next-input__add-on--before"><?php echo e(ecommerce_width_height_unit()); ?></span>
                    <input type="text" class="next-input input-mask-number next-input--invisible" name="height" value="<?php echo e(old('height', $product ? $product->height : ($originalProduct->height ?? 0))); ?>" />
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if(EcommerceHelper::isEnabledSupportDigitalProducts() &&
    ((!$product && !$originalProduct && request()->input('product_type') == Botble\Ecommerce\Enums\ProductTypeEnum::DIGITAL) ||
        ($originalProduct && $originalProduct->isTypeDigital()) ||
        ($product && $product->isTypeDigital()))): ?>
    <div class="mb-3 product-type-digital-management">
        <label for="product_file"><?php echo e(trans('plugins/ecommerce::products.digital_attachments.title')); ?></label>
        <table class="table border">
            <thead>
                <tr>
                    <th width="40"></th>
                    <th><?php echo e(trans('plugins/ecommerce::products.digital_attachments.file_name')); ?></th>
                    <th width="100"><?php echo e(trans('plugins/ecommerce::products.digital_attachments.file_size')); ?></th>
                    <th width="100"><?php echo e(trans('core/base::tables.created_at')); ?></th>
                    <th class="text-end" width="100"></th>
                </tr>
            </thead>
            <tbody>
                <?php if($product): ?>
                    <?php $__currentLoopData = $product->productFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo Form::checkbox('product_files[' . $file->id . ']', 0, true, ['class' => 'd-none']); ?>

                                <?php echo Form::checkbox('product_files[' . $file->id . ']', $file->id, true, ['class' => 'digital-attachment-checkbox']); ?>

                            </td>
                            <td>
                                <div>
                                    <i class="fas fa-paperclip"></i>
                                    <span><?php echo e($file->basename); ?></span>
                                </div>
                            </td>
                            <td><?php echo e(BaseHelper::humanFileSize($file->file_size)); ?></td>
                            <td><?php echo e(BaseHelper::formatDate($file->created_at)); ?></td>
                            <td class="text-end"></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="digital_attachments_input">
            <input type="file" name="product_files_input[]" data-id="<?php echo e(Str::random(10)); ?>">
        </div>
        <div class="mt-2">
            <a href="" class="digital_attachments_btn"><?php echo e(trans('plugins/ecommerce::products.digital_attachments.add')); ?></a>
        </div>
    </div>
    <script type="text/x-custom-template" id="digital_attachment_template">
        <tr data-id="__id__">
            <td>
                <a class="text-danger remove-attachment-input"><i class="fas fa-minus-circle"></i></a>
            </td>
            <td>
                <i class="fas fa-paperclip"></i>
                <span>__file_name__</span>
            </td>
            <td>__file_size__</td>
            <td>-</td>
            <td class="text-end">
                <span class="text-warning"><?php echo e(trans('plugins/ecommerce::products.digital_attachments.unsaved')); ?></span>
            </td>
        </tr>
    </script>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/products/partials/general.blade.php ENDPATH**/ ?>