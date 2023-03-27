<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="text-center pt-5"><?php echo e(trans('core/base::system.cleanup.title')); ?></h1><br>
        <div class="updater-box" dir="ltr">
            <div class="note note-warning">
                <p><?php echo e(trans('core/base::system.cleanup.backup_alert')); ?></p>
            </div>
            <div class="content">
                <p class="fw-bold"><?php echo e(trans('core/base::system.cleanup.messenger_choose_without_table')); ?>:</p>
                <form action="<?php echo e(route('system.cleanup')); ?>" method="POST" id="form-cleanup-database">
                    <?php echo csrf_field(); ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(trans('core/base::system.cleanup.table.name')); ?></th>
                                <th><?php echo e(trans('core/base::system.cleanup.table.count')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="<?php echo \Illuminate\Support\Arr::toCssClasses(['table-secondary' => in_array($table, $disabledTables['disabled'])]) ?>">
                                    <td>
                                        <input class="form-check-input"
                                            <?php if(in_array($table, $disabledTables['disabled'])): echo 'disabled'; endif; ?>
                                            <?php if(in_array($table, $disabledTables['disabled']) || in_array($table, $disabledTables['checked'])): echo 'checked'; endif; ?>
                                            type="checkbox"
                                            value="<?php echo e($table); ?>"
                                            name="tables[]">
                                    </td>
                                    <td><?php echo e($table); ?></td>
                                    <td><?php echo e(DB::table($table)->count()); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="3">
                                    <button class="btn btn-danger btn-trigger-cleanup" type="button"><?php echo e(trans('core/base::system.cleanup.submit_button')); ?></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <?php echo Form::modalAction('cleanup-modal',trans('core/base::system.cleanup.title'), 'danger', trans('core/base::system.cleanup.messenger_confirm_cleanup'), 'cleanup-submit-action', trans('core/base::system.cleanup.submit_button')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(BaseHelper::getAdminMasterLayoutTemplate(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/core/base/resources/views/system/cleanup.blade.php ENDPATH**/ ?>