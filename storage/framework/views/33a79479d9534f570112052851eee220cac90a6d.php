<div class="variation-form-wrapper">
    <form action="">
        <div class="row">
            <?php $__currentLoopData = $productAttributeSets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeSet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 col-sm-6">
                    <div class="form-group mb-3">
                        <label for="attribute-<?php echo e($attributeSet->slug); ?>" class="text-title-field required"><?php echo e($attributeSet->title); ?></label>
                        <div class="ui-select-wrapper">
                            <select class="ui-select" id="attribute-<?php echo e($attributeSet->slug); ?>" name="attribute_sets[<?php echo e($attributeSet->id); ?>]">
                                <?php $__currentLoopData = $attributeSet->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($attribute->id); ?>" <?php if($productVariationsInfo && $productVariationsInfo->where('attribute_set_id', $attributeSet->id)->where('id', $attribute->id)->first()): ?> selected <?php endif; ?>>
                                        <?php echo e($attribute->title); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <svg class="svg-next-icon svg-next-icon-size-16">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#select-chevron"></use>
                            </svg>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php echo $__env->make('plugins/ecommerce::products.partials.general', ['product' => $product, 'originalProduct' => $originalProduct, 'isVariation' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="variation-images">
            <?php echo $__env->make('core/base::forms.partials.images', ['name' => 'images[]', 'values' => isset($product) ? $product->images : []], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </form>

    <?php if (! $__env->hasRenderedOnce('963472ad-3fbe-4c4b-8579-2ace15cf22cd')): $__env->markAsRenderedOnce('963472ad-3fbe-4c4b-8579-2ace15cf22cd'); ?>
        <script id="gallery_select_image_template" type="text/x-custom-template">
            <div class="list-photo-hover-overlay">
                <ul class="photo-overlay-actions">
                    <li>
                        <a class="mr10 btn-trigger-edit-gallery-image" data-bs-toggle="tooltip" data-placement="bottom"
                           data-bs-original-title="<?php echo e(trans('core/base::base.change_image')); ?>">
                            <i class="fa fa-edit"></i>
                        </a>
                    </li>
                    <li>
                        <a class="mr10 btn-trigger-remove-gallery-image" data-bs-toggle="tooltip" data-placement="bottom"
                           data-bs-original-title="<?php echo e(trans('core/base::base.delete_image')); ?>">
                            <i class="fa fa-trash"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="custom-image-box image-box">
                <input type="hidden" name="__name__" class="image-data">
                <img src="<?php echo e(RvMedia::getDefaultImage()); ?>" alt="<?php echo e(trans('core/base::base.preview_image')); ?>" class="preview_image">
                <div class="image-box-actions">
                    <a class="btn-images" data-result="images[]" data-action="select-image">
                        <?php echo e(trans('core/base::forms.choose_image')); ?>

                    </a> |
                    <a class="btn_remove_image">
                        <span></span>
                    </a>
                </div>
            </div>
        </script>
    <?php endif; ?>

</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/products/partials/product-variation-form.blade.php ENDPATH**/ ?>