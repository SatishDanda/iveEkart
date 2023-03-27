<?php $__env->startSection('content'); ?>
    <div id="plugin-list">
        <?php if(config('core.base.general.enable_marketplace_feature')): ?>
            <div class="mb-3">
                <a class="btn-add-plugin" href="<?php echo e(route('plugins.marketplace')); ?>">
                    <i class="fa fa-plus me-3"></i> <?php echo e(trans('packages/plugin-management::plugin.plugins_add_new')); ?>

                </a>
            </div>
        <?php endif; ?>

        <div class="clearfix app-grid--blank-slate row">
            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plugin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="app-card-item col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="app-item app-<?php echo e($plugin->path); ?>">
                        <div class="app-icon">
                            <?php if($plugin->image): ?>
                                <img src="data:image/png;base64,<?php echo e($plugin->image); ?>" alt="<?php echo e($plugin->name); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="app-details">
                            <h4 class="app-name"><?php echo e($plugin->name); ?></h4>
                        </div>
                        <div class="app-footer">
                            <div class="app-description" title="<?php echo e($plugin->description); ?>"><?php echo e($plugin->description); ?></div>
                            <?php if(!config('packages.plugin-management.general.hide_plugin_author', false)): ?>
                                <div class="app-author"><?php echo e(trans('packages/plugin-management::plugin.author')); ?>: <a href="<?php echo e($plugin->url); ?>" target="_blank"><?php echo e($plugin->author); ?></a></div>
                            <?php endif; ?>
                            <div class="app-version"><?php echo e(trans('packages/plugin-management::plugin.version')); ?>: <?php echo e($plugin->version); ?></div>
                            <div class="app-actions">
                                <?php if(Auth::user()->hasPermission('plugins.edit')): ?>
                                    <button class="btn <?php if($plugin->status): ?> btn-warning <?php else: ?> btn-info <?php endif; ?> btn-trigger-change-status" data-plugin="<?php echo e($plugin->path); ?>" data-status="<?php echo e($plugin->status); ?>">
                                        <?php if($plugin->status): ?>
                                            <?php echo e(trans('packages/plugin-management::plugin.deactivate')); ?>

                                        <?php else: ?>
                                            <?php echo e(trans('packages/plugin-management::plugin.activate')); ?>

                                        <?php endif; ?>
                                    </button>
                                <?php endif; ?>

                                <?php if(Auth::user()->hasPermission('plugins.remove')): ?>
                                    <button class="btn btn-danger btn-trigger-remove-plugin" data-plugin="<?php echo e($plugin->path); ?>"><?php echo e(trans('packages/plugin-management::plugin.remove')); ?></button>
                                <?php endif; ?>

                                <button class="btn btn-success btn-trigger-update-plugin" style="display: none;" data-check-update="<?php echo e($plugin->id ?? 'plugin-' . $plugin->path); ?>" data-version="<?php echo e($plugin->version); ?>"><?php echo e(trans('packages/plugin-management::plugin.update')); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <?php echo Form::modalAction('remove-plugin-modal', trans('packages/plugin-management::plugin.remove_plugin'), 'danger', trans('packages/plugin-management::plugin.remove_plugin_confirm_message'), 'confirm-remove-plugin-button', trans('packages/plugin-management::plugin.remove_plugin_confirm_yes')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(BaseHelper::getAdminMasterLayoutTemplate(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/packages/plugin-management/resources/views/index.blade.php ENDPATH**/ ?>