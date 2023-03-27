<figure class="visual-swatches-wrapper widget--colors widget-filter-item" data-type="visual">
    <h4 class="widget-title"><?php echo e(__('By')); ?> <?php echo e($set->title); ?></h4>
    <div class="widget__content ps-custom-scrollbar">
        <div class="attribute-values">
            <ul class="visual-swatch color-swatch">
                <?php $__currentLoopData = $attributes->where('attribute_set_id', $set->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li data-slug="<?php echo e($attribute->slug); ?>"
                        title="<?php echo e($attribute->title); ?>">
                        <div class="custom-checkbox">
                            <label>
                                <input class="form-control product-filter-item" type="checkbox" name="attributes[]" value="<?php echo e($attribute->id); ?>" <?php echo e(in_array($attribute->id, $selected) ? 'checked' : ''); ?>>
				<span style="<?php echo e($attribute->getAttributeStyle()); ?>"></span>
                            </label>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
</figure>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/views/ecommerce/attributes/_layouts-filter/visual.blade.php ENDPATH**/ ?>