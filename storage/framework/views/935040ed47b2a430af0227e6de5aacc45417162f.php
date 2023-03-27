<div class="loading">
    <div class="half-circle-spinner">
        <div class="circle circle-1"></div>
        <div class="circle circle-2"></div>
    </div>
</div>
<!--products list-->
<input type="hidden" name="page" data-value="<?php echo e($products->currentPage()); ?>">
<input type="hidden" name="q" value="<?php echo e(BaseHelper::stringify(request()->query('q'))); ?>">

<div class="ps-shopping-product">
    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6">
                <div class="ps-product">
                    <?php echo Theme::partial('product-item', compact('product')); ?>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="alert alert-warning mt-4 w-100" role="alert">
                <?php echo e(__(':total Product found', ['total' => 0])); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<div class="ps-pagination">
    <?php echo $products->withQueryString()->links(); ?>

</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/views/ecommerce/includes/product-items-grid.blade.php ENDPATH**/ ?>