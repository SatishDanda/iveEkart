<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li <?php if($category->activeChildren->count()): ?> class="menu-item-has-children has-mega-menu" <?php endif; ?>>
        <a href="<?php echo e($category->url); ?>">
            <?php if($category->getMetaData('icon_image', true)): ?>
                <img src="<?php echo e(RvMedia::getImageUrl($category->getMetaData('icon_image', true))); ?>" alt="<?php echo e($category->name); ?>" width="18" height="18">
            <?php elseif($category->getMetaData('icon', true)): ?>
                <i class="<?php echo e($category->getMetaData('icon', true)); ?>"></i>
            <?php endif; ?> <?php echo e($category->name); ?>

        </a>
        <?php if($category->activeChildren->count()): ?>
            <span class="sub-toggle"></span>
            <div class="mega-menu" <?php if($category->activeChildren->count() == 1): ?> style="min-width: 250px;" <?php endif; ?>>
                <?php $__currentLoopData = $category->activeChildren; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mega-menu__column">
                        <?php if($childCategory->activeChildren->count()): ?>
                            <a href="<?php echo e($childCategory->url); ?>"><h4><?php echo e($childCategory->name); ?><span class="sub-toggle"></span></h4></a>
                            <ul class="mega-menu__list">
                                <?php $__currentLoopData = $childCategory->activeChildren; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e($item->url); ?>"><?php echo e($item->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php else: ?>
                            <a href="<?php echo e($childCategory->url); ?>"><h4><?php echo e($childCategory->name); ?></h4></a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/partials/product-categories-dropdown.blade.php ENDPATH**/ ?>