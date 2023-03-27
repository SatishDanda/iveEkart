<?php if(count($referrers) > 0): ?>
    <div class="scroller">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="text-start"><?php echo e(trans('core/base::tables.url')); ?></th>
                    <th class="text-center"><?php echo e(trans('core/base::tables.views')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $referrers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $referrer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->index + 1); ?></td>
                        <td class="text-start"><?php echo e(Str::limit($referrer['url'], 80)); ?></td>
                        <td style="width: 160px" class="text-center"><?php echo e($referrer['pageViews']); ?> (<?php echo e(ucfirst(trans('plugins/analytics::analytics.views'))); ?>)</td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <?php echo $__env->make('core/dashboard::partials.no-data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/analytics/resources/views/widgets/referrer.blade.php ENDPATH**/ ?>