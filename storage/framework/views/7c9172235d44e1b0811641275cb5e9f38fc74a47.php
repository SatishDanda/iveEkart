<?php
    $brands = get_all_brands(['status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED], ['slugable'], ['products']);

    $tags = app(\Botble\Ecommerce\Repositories\Interfaces\ProductTagInterface::class)->advancedGet([
        'condition' => ['status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED],
        'with'      => ['slugable'],
        'withCount' => ['products'],
        'order_by'  => ['products_count' => 'desc'],
        'take'      => 10,
    ]);
    $rand = mt_rand();
    $categoriesRequest = (array)request()->input('categories', []);
    $urlCurrent = URL::current();

    Theme::asset()->usePath()
                ->add('custom-scrollbar-css', 'plugins/mcustom-scrollbar/jquery.mCustomScrollbar.css');
    Theme::asset()->container('footer')->usePath()
                ->add('custom-scrollbar-js', 'plugins/mcustom-scrollbar/jquery.mCustomScrollbar.js', ['jquery']);
?>

<aside class="widget widget_shop">
    <h4 class="widget-title"><?php echo e(__('Product Categories')); ?></h4>
    <div class="widget-product-categories">
        <?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.includes.categories', compact('categories', 'categoriesRequest', 'urlCurrent'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</aside>

<?php if(count($brands) > 0): ?>
    <aside class="widget widget_shop">
        <h4 class="widget-title"><?php echo e(__('By Brands')); ?></h4>
        <figure class="ps-custom-scrollbar">
            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($brand->products_count > 0): ?>
                    <div class="ps-checkbox">
                        <input class="form-control product-filter-item" type="checkbox" name="brands[]" id="brand-<?php echo e($rand); ?>-<?php echo e($brand->id); ?>" value="<?php echo e($brand->id); ?>" <?php if(in_array($brand->id, (array)request()->input('brands', []))): ?> checked <?php endif; ?>>
                        <label for="brand-<?php echo e($rand); ?>-<?php echo e($brand->id); ?>"><span><?php echo e($brand->name); ?> <span class="d-inline-block">(<?php echo e($brand->products_count); ?>)</span> </span></label>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </figure>
    </aside>
<?php endif; ?>

<?php if(count($tags) > 0): ?>
    <aside class="widget widget_shop">
        <h4 class="widget-title"><?php echo e(__('By Tags')); ?></h4>
        <figure class="ps-custom-scrollbar">
            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($tag->products_count > 0): ?>
                    <div class="ps-checkbox">
                        <input class="form-control product-filter-item" type="checkbox" name="tags[]" id="tag-<?php echo e($rand); ?>-<?php echo e($tag->id); ?>" value="<?php echo e($tag->id); ?>" <?php if(in_array($tag->id, (array)request()->input('tags', []))): ?> checked <?php endif; ?>>
                        <label for="tag-<?php echo e($rand); ?>-<?php echo e($tag->id); ?>"><span><?php echo e($tag->name); ?> <span class="d-inline-block">(<?php echo e($tag->products_count); ?>)</span></span></label>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </figure>
    </aside>
<?php endif; ?>

<aside class="widget widget_shop">
    <h4 class="widget-title"><?php echo e(__('By Price')); ?></h4>
    <div class="widget__content nonlinear-wrapper">
        <div class="nonlinear" data-min="0" data-max="<?php echo e((int)theme_option('max_filter_price', 100000) * get_current_exchange_rate()); ?>"></div>
        <div class="ps-slider__meta">
            <input class="product-filter-item product-filter-item-price-0" name="min_price" data-min="0" value="<?php echo e(request()->input('min_price', 0)); ?>" type="hidden">
            <input class="product-filter-item product-filter-item-price-1" name="max_price" data-max="<?php echo e(theme_option('max_filter_price', 100000)); ?>" value="<?php echo e(request()->input('max_price', theme_option('max_filter_price', 100000))); ?>" type="hidden">
            <span class="ps-slider__value">
                <span class="ps-slider__min"></span> <?php echo e(get_application_currency()->title); ?></span> -
                <span class="ps-slider__value"><span class="ps-slider__max"></span> <?php echo e(get_application_currency()->title); ?>

            </span>
        </div>
    </div>

    <?php echo render_product_swatches_filter([
        'view' => Theme::getThemeNamespace() . '::views.ecommerce.attributes.attributes-filter-renderer'
    ]); ?>

</aside>

<input type="hidden" name="sort-by" class="product-filter-item" value="<?php echo e(request()->input('sort-by')); ?>">
<input type="hidden" name="layout" class="product-filter-item" value="<?php echo e(request()->input('layout')); ?>">
<input type="hidden" name="q" value="<?php echo e(BaseHelper::stringify(request()->query('q'))); ?>">
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/views/ecommerce/includes/filters.blade.php ENDPATH**/ ?>