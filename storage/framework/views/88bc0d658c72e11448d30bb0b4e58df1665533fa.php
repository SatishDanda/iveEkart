<div class="list-selected-products <?php if(!$products->count()): ?> hidden <?php endif; ?>">
    <div class="mt20"><label class="text-title-field"><?php echo e(trans('plugins/ecommerce::products.selected_products')); ?>:</label></div>
    <div class="table-wrapper p-none mt10 mb20 ps-relative">
        <table class="table-normal">
            <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="width-60-px min-width-60-px">
                        <div class="wrap-img vertical-align-m-i">
                            <img class="thumb-image" src="<?php echo e(RvMedia::getImageUrl($relatedProduct->image, 'thumb', false, RvMedia::getDefaultImage())); ?>" alt="<?php echo e($relatedProduct->name); ?>"></div>
                    </td>
                    <td class="pl5 p-r5 min-width-200-px">
                        <a class="hover-underline pre-line" href="<?php echo e(route('products.edit', $relatedProduct->id)); ?>"><?php echo e($relatedProduct->name); ?></a>
                        <?php if($includeVariation): ?>
                            <p class="type-subdued">
                                <?php if($relatedProduct->variationInfo->id): ?>
                                    <?php $__currentLoopData = $relatedProduct->variationInfo->variationItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variationItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($variationItem->attribute->title); ?>

                                        <?php if(!$loop->last): ?>
                                            /
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </p>
                        <?php endif; ?>
                    </td>
                    <td class="pl5 p-r5 text-end width-20-px min-width-20-px">
                        <a href="#" class="btn-trigger-remove-selected-product" title="<?php echo e(trans('plugins/ecommerce::products.delete')); ?>" data-id="<?php echo e($relatedProduct->id); ?>">
                            <i class="fa fa-times"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/products/partials/selected-products-list.blade.php ENDPATH**/ ?>