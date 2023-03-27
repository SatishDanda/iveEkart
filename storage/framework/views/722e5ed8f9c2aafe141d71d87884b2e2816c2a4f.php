<?php if(count($pages) > 0): ?>
    <div class="scroller">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(trans('core/base::tables.url')); ?></th>
                    <th><?php echo e(trans('core/base::tables.views')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->index + 1); ?></td>
                        <td class="text-start"><a href="<?php echo e($page['url']); ?>" target="_blank"><?php echo e(Str::limit($page['pageTitle'])); ?></a></td>
                        <td><?php echo e($page['pageViews']); ?> (<?php echo e(ucfirst(trans('plugins/analytics::analytics.views'))); ?>)</td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <?php echo $__env->make('core/dashboard::partials.no-data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/analytics/resources/views/widgets/page.blade.php ENDPATH**/ ?>