<?php $__env->startSection('content'); ?>
    <?php do_action(BASE_ACTION_TOP_FORM_CONTENT_NOTIFICATION, request(), WIDGET_MANAGER_MODULE_SCREEN_NAME) ?>
    <div class="widget-main" id="wrap-widgets">
        <div class="row row-cols-2">
            <div class="col">
                <h2><?php echo e(trans('packages/widget::widget.available')); ?></h2>
                <p><?php echo e(trans('packages/widget::widget.instruction')); ?></p>
                <ul id="wrap-widget-1" class="row row-cols-1 row-cols-md-2 g-2">
                    <?php $__currentLoopData = Widget::getWidgets(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li data-id="<?php echo e($widget->getId()); ?>" class="col">
                            <div class="widget-handle">
                                <p class="widget-name">
                                    <?php echo e($widget->getConfig()['name']); ?>

                                    <span class="text-end">
                                        <i class="fa fa-caret-up"></i>
                                    </span>
                                </p>
                            </div>
                            <div class="widget-content">
                                <form method="post">
                                    <input type="hidden" name="id" value="<?php echo e($widget->getId()); ?>">
                                    <?php echo $widget->form(); ?>

                                    <div class="widget-control-actions">
                                        <div class="float-start">
                                            <button class="btn btn-danger widget-control-delete"><?php echo e(trans('packages/widget::widget.delete')); ?></button>
                                        </div>
                                        <div class="float-end text-end">
                                            <button class="btn btn-primary widget_save"><?php echo e(trans('core/base::forms.save_and_continue')); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="widget-description">
                                <p class="small"><?php echo e($widget->getConfig()['description']); ?></p>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="col" id="added-widget">
                <?php echo apply_filters(WIDGET_TOP_META_BOXES, null, WIDGET_MANAGER_MODULE_SCREEN_NAME); ?>

                <div class="row row-cols-1 row-cols-md-2">
                    <?php $__currentLoopData = WidgetGroup::getGroups(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col sidebar-item" data-id="<?php echo e($group->getId()); ?>">
                            <div class="sidebar-area">
                                <div class="sidebar-header">
                                    <h3 class="text-break position-relative pe-3" role="button">
                                        <?php echo e($group->getName()); ?>

                                        <span class="position-absolute end-0 top-0 me-1">
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </h3>
                                    <p><?php echo e($group->getDescription()); ?></p>
                                </div>
                                <ul id="wrap-widget-<?php echo e($loop->index + 2); ?>">
                                    <?php echo $__env->make('packages/widget::item', ['widgetAreas' => $group->getWidgets()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
    <script>
        'use strict';
        var BWidget = BWidget || {};
        BWidget.routes = {
            'delete': '<?php echo e(route('widgets.destroy', ['ref_lang' => request()->input('ref_lang')])); ?>',
            'save_widgets_sidebar': '<?php echo e(route('widgets.save_widgets_sidebar', ['ref_lang' => request()->input('ref_lang')])); ?>'
        };
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(BaseHelper::getAdminMasterLayoutTemplate(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/packages/widget/resources/views/list.blade.php ENDPATH**/ ?>