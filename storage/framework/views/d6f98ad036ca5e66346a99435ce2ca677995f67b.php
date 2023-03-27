<?php
    $categories->loadMissing(['slugable', 'activeChildren:id,name,parent_id', 'activeChildren.slugable']);

    if (!empty($categoriesRequest)) {
        $categories = $categories->whereIn('id', $categoriesRequest);
    }
?>

<ul class="ps-list--categories">
    <?php if(!empty($categoriesRequest)): ?>
        <li>
            <a href="<?php echo e(route('public.products')); ?>">
                <i class="icon-chevron-left"></i> <span><?php echo e(__('All categories')); ?></span>
            </a>
        </li>
    <?php endif; ?>

    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $isActive = $urlCurrent == $category->url ||
            (!empty($categoriesRequest && in_array($category->id, $categoriesRequest))) ||
            ($loop->first && $categoriesRequest && $categories->count() == 1 && $category->activeChildren->count());
        ?>
        <li class="<?php if($isActive): ?> current-menu-item <?php endif; ?> <?php if($category->activeChildren->count()): ?> menu-item-has-children <?php endif; ?>">
            <a href="<?php echo e($category->url); ?>"><?php echo BaseHelper::clean($category->name); ?></a>
            <?php if($category->activeChildren->count()): ?>
                <?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.includes.sub-categories', [
                    'children' => $category->activeChildren,
                    'isActive' => $isActive,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/views/ecommerce/includes/categories.blade.php ENDPATH**/ ?>