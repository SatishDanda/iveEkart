<div id="product-extras" class="widget meta-boxes">
    <div class="widget-title">
        <h4><span><?php echo e(trans('plugins/ecommerce::products.related_products')); ?></span></h4>
    </div>
    <div class="widget-body">
        <div class="form-group mb-3">
            <label class="control-label"><?php echo e(trans('plugins/ecommerce::products.related_products')); ?></label>
            <input type="hidden" name="related_products" value="<?php if($product): ?> <?php echo e(implode(',', $product->products()->allRelatedIds()->toArray())); ?> <?php endif; ?>" />
            <div class="box-search-advance product">
                <div>
                    <input type="text" class="next-input textbox-advancesearch" placeholder="<?php echo e(trans('plugins/ecommerce::products.search_products')); ?>" data-target="<?php echo e($dataUrl); ?>">
                </div>
                <div class="panel panel-default">

                </div>
            </div>
            <?php echo $__env->make('plugins/ecommerce::products.partials.selected-products-list', ['products' => $product ? $product->products : collect(), 'includeVariation' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <hr>
        <div class="form-group mb-3">
            <label class="control-label"><?php echo e(trans('plugins/ecommerce::products.cross_selling_products')); ?></label>
            <input type="hidden" name="cross_sale_products" value="<?php if($product): ?> <?php echo e(implode(',', $product->crossSales()->allRelatedIds()->toArray())); ?> <?php endif; ?>"/>
            <div class="box-search-advance product">
                <div>
                    <input type="text" class="next-input textbox-advancesearch" placeholder="<?php echo e(trans('plugins/ecommerce::products.search_products')); ?>" data-target="<?php echo e($dataUrl); ?>">
                </div>
                <div class="panel panel-default">

                </div>
            </div>
            <?php echo $__env->make('plugins/ecommerce::products.partials.selected-products-list', ['products' => $product ? $product->crossSales : collect(), 'includeVariation' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <?php if(false): ?>
            <hr>
            <div class="form-group mb-3">
                <label class="control-label"><?php echo e(trans('plugins/ecommerce::products.up_selling_products')); ?></label>
                <input type="hidden" name="up_sale_products" value="<?php if($product): ?> <?php echo e(implode(',', $product->upSales()->allRelatedIds()->toArray())); ?> <?php endif; ?>"/>
                <div class="box-search-advance product">
                    <div>
                        <input type="text" class="next-input textbox-advancesearch" placeholder="<?php echo e(trans('plugins/ecommerce::products.search_products')); ?>" data-target="<?php echo e($dataUrl); ?>">
                    </div>
                    <div class="panel panel-default">

                    </div>
                </div>
                <?php echo $__env->make('plugins/ecommerce::products.partials.selected-products-list', ['products' => $product ? $product->upSales : collect(), 'includeVariation' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <hr>
            <div class="form-group mb-3">
                <label class="control-label"><?php echo e(trans('plugins/ecommerce::products.grouped_products')); ?></label>
                <input type="hidden" name="grouped_products" value="<?php if($product): ?> <?php echo e(implode(',', $product->groupedItems()->pluck('product_id')->all())); ?> <?php endif; ?>"/>
                <div class="box-search-advance product">
                    <div>
                        <input type="text" class="next-input textbox-advancesearch" placeholder="<?php echo e(trans('plugins/ecommerce::products.search_products')); ?>" data-target="<?php echo e($dataUrl); ?>">
                    </div>
                    <div class="panel panel-default">

                    </div>
                </div>
                <?php echo $__env->make('plugins/ecommerce::products.partials.selected-products-list', ['products' => $product ? $product->groupedProduct : collect(), 'includeVariation' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<script id="selected_product_list_template" type="text/x-custom-template">
    <tr>
        <td class="width-60-px min-width-60-px">
            <div class="wrap-img vertical-align-m-i">
                <img class="thumb-image" src="__image__" alt="__name__" title="__name__">
            </div>
        </td>
        <td class="pl5 p-r5 min-width-200-px">
            <a class="hover-underline pre-line" href="__url__">__name__</a>
            <p class="type-subdued">__attributes__</p>
        </td>
        <td class="pl5 p-r5 text-end width-20-px min-width-20-px">
            <a href="#" class="btn-trigger-remove-selected-product" title="<?php echo e(trans('plugins/ecommerce::products.delete')); ?>" data-id="__id__">
                <i class="fa fa-times"></i>
            </a>
        </td>
    </tr>
</script>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/products/partials/extras.blade.php ENDPATH**/ ?>