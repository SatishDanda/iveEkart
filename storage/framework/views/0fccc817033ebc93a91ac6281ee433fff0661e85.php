<div class="panel-body">
    <div class="list-search-data">
        <ul class="clearfix">
            <?php if(!$availableProducts->isEmpty()): ?>
                <?php $__currentLoopData = $availableProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $availableProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="<?php if(!$includeVariation): ?> selectable-item <?php endif; ?>" <?php if(!$includeVariation): ?> data-name="<?php echo e($availableProduct->name); ?>"  data-image="<?php echo e(RvMedia::getImageUrl($availableProduct->image, 'thumb', false, RvMedia::getDefaultImage())); ?>" data-id="<?php echo e($availableProduct->id); ?>" data-url="<?php echo e(route('products.edit', $availableProduct->id)); ?>" data-price="<?php echo e($availableProduct->price); ?>" <?php endif; ?>>
                        <div class="wrap-img inline_block vertical-align-t float-start"><img class="thumb-image" src="<?php echo e(RvMedia::getImageUrl($availableProduct->image, 'thumb', false, RvMedia::getDefaultImage())); ?>" alt="<?php echo e($availableProduct->name); ?>"></div>
                        <label class="inline_block ml10 mt10 ws-nm" style="width:calc(100% - 50px);"><?php echo e($availableProduct->name); ?></label>
                        <?php if($includeVariation): ?>
                            <div class="clear"></div>
                            <ul>
                                <?php $__currentLoopData = $availableProduct->variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="clearfix product-variant selectable-item" data-name="<?php echo e($availableProduct->name); ?>"  data-image="<?php echo e(RvMedia::getImageUrl($variation->product->image, 'thumb', false, RvMedia::getDefaultImage())); ?>" data-id="<?php echo e($variation->product->id); ?>" data-url="<?php echo e(route('products.edit', $availableProduct->id)); ?>" data-price="<?php echo e($availableProduct->price); ?>">
                                        <a href="#" class="color_green float-start">
                                            <span>
                                                <?php $__currentLoopData = $variation->variationItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variationItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($variationItem->attribute->title); ?>

                                                    <?php if(!$loop->last): ?>
                                                        /
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </span>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <li>
                    <p><?php echo e(trans('plugins/ecommerce::products.form.no_results')); ?></p>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>

<?php if($availableProducts->hasPages()): ?>
    <div class="panel-footer">
        <div class="btn-group float-end">
            <?php echo $availableProducts->links(); ?>

        </div>
        <div class="clearfix"></div>
    </div>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/products/partials/panel-search-data.blade.php ENDPATH**/ ?>