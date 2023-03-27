<?php if(count($breadcrumbs)): ?>
    <ol class="breadcrumb" v-pre>
        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($breadcrumb->url && !$loop->last): ?>
                <li class="breadcrumb-item"><a href="<?php echo e($breadcrumb->url); ?>"><?php echo BaseHelper::clean($breadcrumb->title); ?></a></li>
            <?php else: ?>
                <li class="breadcrumb-item active"><?php echo BaseHelper::clean($breadcrumb->title, 60); ?></li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/core/base/resources/views/layouts/partials/breadcrumbs.blade.php ENDPATH**/ ?>