<ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <?php $__currentLoopData = $crumbs = Theme::breadcrumb()->getCrumbs(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $crumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($i != (count($crumbs) - 1)): ?>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="<?php echo e($crumb['url']); ?>" itemprop="item"><?php echo BaseHelper::clean($crumb['label']); ?></a>
                <span class="extra-breadcrumb-name"></span>
                <meta itemprop="name" content="<?php echo e($crumb['label']); ?>" />
                <meta itemprop="position" content="<?php echo e($i + 1); ?>" />
            </li>
        <?php else: ?>
            <li aria-current="page" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <span><?php echo BaseHelper::clean($crumb['label']); ?></span>
                <meta itemprop="name" content="<?php echo e($crumb['label']); ?>" />
                <meta itemprop="position" content="<?php echo e($i + 1); ?>" />
            </li>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/partials/breadcrumbs.blade.php ENDPATH**/ ?>