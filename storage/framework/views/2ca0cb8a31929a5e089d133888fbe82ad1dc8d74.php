<?php $__env->startSection('content'); ?>
    <?php do_action(BASE_ACTION_TOP_FORM_CONTENT_NOTIFICATION, request(), THEME_OPTIONS_MODULE_SCREEN_NAME) ?>
    <div id="theme-option-header">
        <div class="display_header">
            <h2><?php echo e(trans('packages/theme::theme.theme_options')); ?></h2>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="theme-option-container">
        <?php echo Form::open(['route' => 'theme.options', 'method' => 'POST']); ?>

            <div class="theme-option-sticky">
                <div class="info_bar">
                    <div class="float-start">
                        <?php if(ThemeOption::getArg('debug') == true): ?> <span class="theme-option-dev-mode-notice"><?php echo e(trans('packages/theme::theme.developer_mode')); ?></span><?php endif; ?>
                    </div>
                    <div class="theme-option-action_bar">
                        <?php echo apply_filters(THEME_OPTIONS_ACTION_META_BOXES, null, THEME_OPTIONS_MODULE_SCREEN_NAME); ?>

                        <button type="submit" class="btn btn-primary button-save-theme-options"><?php echo e(trans('packages/theme::theme.save_changes')); ?></button>
                    </div>
                </div>
            </div>
            <div class="theme-option-sidebar">
                <ul class="nav nav-tabs tab-in-left">
                    <?php $__currentLoopData = ThemeOption::constructSections(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item">
                            <a href="#tab_<?php echo e($section['id']); ?>" class="nav-link <?php if($loop->first): ?> active <?php endif; ?>" data-bs-toggle="tab"><?php if(!empty($section['icon'])): ?><i class="<?php echo e($section['icon']); ?>"></i> <?php endif; ?> <?php echo e($section['title']); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="theme-option-main">
                <div class="tab-content tab-content-in-right">
                    <?php $__currentLoopData = ThemeOption::constructSections(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="tab-pane <?php if($loop->first): ?> active <?php endif; ?>" id="tab_<?php echo e($section['id']); ?>">
                            <?php $__currentLoopData = ThemeOption::constructFields($section['id']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-group mb-3 <?php if($errors->has($field['attributes']['name'])): ?> has-error <?php endif; ?>">
                                    <?php echo Form::label($field['attributes']['name'], $field['label'], ['class' => 'control-label']); ?>

                                    <?php echo ThemeOption::renderField($field); ?>

                                    <?php if(array_key_exists('helper', $field)): ?>
                                        <span class="help-block"><?php echo BaseHelper::clean($field['helper']); ?></span>
                                    <?php endif; ?>
                                </div>
                                <hr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="theme-option-sticky">
                <div class="info_bar">
                    <div class="theme-option-action_bar">
                        <?php echo apply_filters(THEME_OPTIONS_ACTION_META_BOXES, null, THEME_OPTIONS_MODULE_SCREEN_NAME); ?>

                        <button type="submit" class="btn btn-primary button-save-theme-options"><?php echo e(trans('packages/theme::theme.save_changes')); ?></button>
                    </div>
                </div>
            </div>
        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(BaseHelper::getAdminMasterLayoutTemplate(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/packages/theme/resources/views/options.blade.php ENDPATH**/ ?>