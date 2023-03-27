<div id="product-variations-wrapper">
    <div class="variation-actions">
        <a href="#" class="btn-trigger-delete-selected-variations text-danger" style="display: none" data-target="<?php echo e(route('products.delete-versions')); ?>"><?php echo e(trans('plugins/ecommerce::products.delete_selected_variations')); ?></a>
        <a href="#" class="btn-trigger-select-product-attributes" data-target="<?php echo e(route('products.store-related-attributes', $product->id)); ?>"><?php echo e(trans('plugins/ecommerce::products.edit_attribute')); ?></a>
        <a href="#" class="btn-trigger-generate-all-versions" data-target="<?php echo e(route('products.generate-all-versions', $product->id)); ?>"><?php echo e(trans('plugins/ecommerce::products.generate_all_variations')); ?></a>
    </div>
    <?php if(!$productVariations->isEmpty()): ?>
        <table class="table table-hover-variants">
            <thead>
            <tr>
                <th><input class="table-check-all" data-set=".table-hover-variants .checkboxes" type="checkbox"></th>
                <th><?php echo e(trans('plugins/ecommerce::products.form.image')); ?></th>
                <?php $__currentLoopData = $productAttributeSets->where('is_selected', '<>', null)->whereIn('id', $productVariationsInfo->pluck('attribute_set_id')->all())->sortBy('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeSet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th><?php echo e($attributeSet->title); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $productAttributeSets->where('is_selected', '<>', null)->whereNotIn('id', $productVariationsInfo->pluck('attribute_set_id')->all())->sortBy('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeSet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th><?php echo e($attributeSet->title); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <th><?php echo e(trans('plugins/ecommerce::products.form.price')); ?></th>
                <th><?php echo e(trans('plugins/ecommerce::products.form.is_default')); ?></th>
                <?php if(EcommerceHelper::isEnabledSupportDigitalProducts() && $product && $product->isTypeDigital()): ?>
                    <th><?php echo e($product->product_type->label()); ?></th>
                <?php endif; ?>
                <th class="text-center"><?php echo e(trans('plugins/ecommerce::products.form.action')); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $productVariations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $currentRelatedProduct = $productsRelatedToVariation->where('variation_id', $variation->id)->first();
                ?>
                <tr id="variation-id-<?php echo e($variation->id); ?>">
                    <td style="width: 20px;"><input type="checkbox" class="checkboxes m-0" name="id[]" value="<?php echo e($variation->id); ?>"></td>
                    <td>
                        <div class="wrap-img-product">
                            <img src="<?php echo e(RvMedia::getImageUrl($currentRelatedProduct && $currentRelatedProduct->image ? $currentRelatedProduct->image : $product->image, 'thumb', false, RvMedia::getDefaultImage())); ?>" alt="<?php echo e(trans('plugins/ecommerce::products.form.image')); ?>">
                        </div>
                    </td>
                    <?php $__currentLoopData = $productVariationsInfo->where('variation_id', $variation->id)->sortBy('attribute_set_id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e($item->title); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php for($index = 0; $index < ($productAttributeSets->where('is_selected', '<>', null)->count() - $productVariationsInfo->where('variation_id', $variation->id)->count()); $index++): ?>
                        <td>--</td>
                    <?php endfor; ?>
                    <td>
                        <?php if($currentRelatedProduct): ?>
                            <?php echo e(format_price($currentRelatedProduct->front_sale_price)); ?>

                            <?php if($currentRelatedProduct->front_sale_price != $currentRelatedProduct->price): ?>
                                <del class="text-danger"><?php echo e(format_price($currentRelatedProduct->price)); ?></del>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php echo e(format_price($product->front_sale_price)); ?>

                            <?php if($product->front_sale_price != $product->price): ?>
                                <del class="text-danger"><?php echo e(format_price($product->price)); ?></del>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                    <td>
                        <label>
                            <input type="radio"
                                   <?php echo e($variation->is_default ? 'checked' : ''); ?>

                                   name="variation_default_id"
                                   value="<?php echo e($variation->id); ?>">
                        </label>
                    </td>
                    <?php if(EcommerceHelper::isEnabledSupportDigitalProducts() && $currentRelatedProduct && $currentRelatedProduct->isTypeDigital()): ?>
                        <td>
                            <span><?php echo e($currentRelatedProduct->productFiles->count()); ?></span>
                            <span><i class="fas fa-paperclip"></i></span>
                        </td>
                    <?php endif; ?>
                    <td style="width: 180px;" class="text-center">
                        <a href="#" class="btn btn-info btn-trigger-edit-product-version"
                                data-target="<?php echo e(route('products.update-version', $variation->id)); ?>"
                                data-load-form="<?php echo e(route('products.get-version-form', $variation->id)); ?>"
                        ><?php echo e(trans('plugins/ecommerce::products.edit_variation_item')); ?></a>
                        <a href="#" data-target="<?php echo e(route('products.delete-version', $variation->id)); ?>" data-id="<?php echo e($variation->id); ?>"
                           class="btn-trigger-delete-version btn btn-danger"><?php echo e(trans('plugins/ecommerce::products.delete')); ?></a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <p><?php echo e(trans('plugins/ecommerce::products.variations_box_description')); ?></p>
    <?php endif; ?>

    <br>
    <a href="#" class="btn-trigger-add-new-product-variation"
       data-target="<?php echo e(route('products.add-version', $product->id)); ?>"
       data-load-form="<?php echo e(route('products.get-version-form', ['id' => 0, 'product_id' => $product->id])); ?>"
       data-processing="<?php echo e(trans('plugins/ecommerce::products.processing')); ?>"
    ><?php echo e(trans('plugins/ecommerce::products.add_new_variation')); ?></a>
</div>

<?php echo Form::modalAction('select-attribute-sets-modal', trans('plugins/ecommerce::products.select_attribute'), 'info', view('plugins/ecommerce::products.partials.attribute-sets', compact('productAttributeSets'))->render(), 'store-related-attributes-button', trans('plugins/ecommerce::products.save_changes')); ?>

<?php echo Form::modalAction('add-new-product-variation-modal', trans('plugins/ecommerce::products.add_new_variation'), 'info', view('core/base::elements.loading')->render(), 'store-product-variation-button', trans('plugins/ecommerce::products.save_changes'), 'modal-lg'); ?>

<?php echo Form::modalAction('edit-product-variation-modal', trans('plugins/ecommerce::products.edit_variation'), 'info', view('core/base::elements.loading')->render(), 'update-product-variation-button', trans('plugins/ecommerce::products.save_changes'), 'modal-lg'); ?>

<?php echo Form::modalAction('generate-all-versions-modal', trans('plugins/ecommerce::products.generate_all_variations'), 'info', trans('plugins/ecommerce::products.generate_all_variations_confirmation'), 'generate-all-versions-button', trans('plugins/ecommerce::products.continue')); ?>

<?php echo Form::modalAction('confirm-delete-version-modal', trans('plugins/ecommerce::products.delete_variation'), 'danger', trans('plugins/ecommerce::products.delete_variation_confirmation'), 'delete-version-button', trans('plugins/ecommerce::products.continue')); ?>

<?php echo Form::modalAction('delete-variations-modal', trans('plugins/ecommerce::products.delete_variations'), 'danger', trans('plugins/ecommerce::products.delete_variations_confirmation'), 'delete-selected-variations-button', trans('plugins/ecommerce::products.continue')); ?>

<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/products/partials/configurable.blade.php ENDPATH**/ ?>