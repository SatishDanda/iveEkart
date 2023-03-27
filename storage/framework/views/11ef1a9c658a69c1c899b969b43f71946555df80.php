<?php if($productAttributeSets->count() > 0): ?>
    <div class="add-new-product-attribute-wrap">
        <input type="hidden" name="is_added_attributes" id="is_added_attributes" value="0">
        <a href="#" class="btn-trigger-add-attribute" data-bs-toggle-text="<?php echo e(trans('plugins/ecommerce::products.form.cancel')); ?>"><?php echo e(trans('plugins/ecommerce::products.form.add_new_attributes')); ?></a>
        <p><?php echo e(trans('plugins/ecommerce::products.form.add_new_attributes_description')); ?></p>
        <div class="list-product-attribute-values-wrap hidden">
            <div class="product-select-attribute-item-template">
                <div class="product-attribute-set-item">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group mb-3">
                                <label class="text-title-field"><?php echo e(trans('plugins/ecommerce::products.form.attribute_name')); ?></label>
                                <select class="next-input product-select-attribute-item">
                                    <?php $__currentLoopData = $productAttributeSets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>">
                                            <?php echo e($item->title); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group mb-3">
                                <label class="text-title-field"><?php echo e(trans('plugins/ecommerce::products.form.value')); ?></label>
                                <div class="product-select-attribute-item-value-wrap">

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 product-set-item-delete-action hidden">
                            <div class="form-group mb-3">
                                <label class="text-title-field">&nbsp;</label>
                                <div style="height: 36px;line-height: 33px;vertical-align: middle">
                                    <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php $__currentLoopData = $productAttributeSets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeSet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product-select-attribute-item-wrap-template product-select-attribute-item-value-wrap-<?php echo e($attributeSet->id); ?>">
                    <select class="next-input product-select-attribute-item-value product-select-attribute-item-value-id-<?php echo e($attributeSet->id); ?>" data-set-id="<?php echo e($attributeSet->id); ?>">
                        <?php $__currentLoopData = $attributeSet->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($attribute->id); ?>">
                                <?php echo e($attribute->title); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="list-product-attribute-wrap hidden">
            <div class="list-product-attribute-wrap-detail">
                <div class="product-attribute-set-item">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group mb-3">
                                <label class="text-title-field"><?php echo e(trans('plugins/ecommerce::products.form.attribute_name')); ?></label>
                                <select class="next-input product-select-attribute-item">
                                    <?php $__currentLoopData = $productAttributeSets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>">
                                            <?php echo e($item->title); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group mb-3">
                                <label class="text-title-field"><?php echo e(trans('plugins/ecommerce::products.form.value')); ?></label>
                                <div class="product-select-attribute-item-value-wrap">
                                    <select class="next-input product-select-attribute-item-value product-select-attribute-item-value-id-<?php echo e($attributeSetId); ?>"  name="added_attributes[<?php echo e($attributeSetId); ?>]" data-set-id="<?php echo e($attributeSetId); ?>">
                                        <?php $__currentLoopData = $productAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($attribute->id); ?>">
                                                <?php echo e($attribute->title); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 product-set-item-delete-action hidden">
                            <div class="form-group mb-3">
                                <label class="text-title-field">&nbsp;</label>
                                <div style="height: 36px;line-height: 33px;vertical-align: middle">
                                    <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <a href="#" class="btn btn-secondary btn-trigger-add-attribute-item <?php if($productAttributeSets->count() < 2): ?> hidden <?php endif; ?>"><?php echo e(trans('plugins/ecommerce::products.form.add_more_attribute')); ?></a>
            <?php if($product && is_object($product) && $product->id): ?>
                <a href="#" class="btn btn-info btn-trigger-add-attribute-to-simple-product" data-target="<?php echo e(route('products.add-attribute-to-product', $product->id)); ?>"><?php echo e(trans('plugins/ecommerce::products.form.continue')); ?></a>
            <?php endif; ?>
        </div>
    </div>

<?php else: ?>
    <p><?php echo trans('plugins/ecommerce::products.form.create_product_variations', ['link' => Html::link(route('product-attribute-sets.create'), trans('plugins/ecommerce::products.form.add_new_attributes'))]); ?></p>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/products/partials/add-product-attributes.blade.php ENDPATH**/ ?>