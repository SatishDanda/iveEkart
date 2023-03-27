<?php if(count($browsers) > 0): ?>
    <div class="scroller">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(trans('core/base::tables.browser')); ?></th>
                    <th><?php echo e(trans('core/base::tables.session')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $browsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $browser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->index + 1); ?></td>
                        <td class="text-start"><?php echo e($browser['browser']); ?></td>
                        <td><?php echo e($browser['sessions']); ?> (<?php echo e(trans('plugins/analytics::analytics.sessions')); ?>)</td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <?php echo $__env->make('core/dashboard::partials.no-data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/analytics/resources/views/widgets/browser.blade.php ENDPATH**/ ?>