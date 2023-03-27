<?php
    $urlCurrent = URL::current();
    $children->loadMissing(['slugable', 'activeChildren:id,name,parent_id', 'activeChildren.slugable']);
    if (! $isActive) {
        foreach ($children as $activeChildren) {
            if ($activeChildren->url == $urlCurrent) {
                $isActive = true;
                break;
            }
        }
    }
?>

<span class="sub-toggle <?php if($isActive): ?> active <?php endif; ?>"><i class="icon-angle"></i></span>
<ul class="sub-menu" <?php if($isActive || in_array($urlCurrent, collect($children->toArray())->pluck('url')->toArray())): ?> style="display:block" <?php endif; ?>>
    <?php $__currentLoopData = $children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="<?php if($urlCurrent == $category->url): ?> current-menu-item <?php endif; ?> <?php if($category->activeChildren->count()): ?> menu-item-has-children <?php endif; ?>"><a href="<?php echo e($category->url); ?>"><?php echo BaseHelper::clean($category->name); ?></a>
            <?php if($category->activeChildren->count()): ?>
                <?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.includes.sub-categories', ['children' => $category->activeChildren, 'isActive' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/views/ecommerce/includes/sub-categories.blade.php ENDPATH**/ ?>