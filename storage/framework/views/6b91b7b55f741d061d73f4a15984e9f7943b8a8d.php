<?php $__env->startSection('content'); ?>
    <div class="user-profile row">
        <div class="col-md-3 col-sm-5 crop-avatar">
            <!-- Profile links -->
            <div class="block">
                <div class="block mt-element-card mt-card-round mt-element-overlay">
                    <div class="thumbnail">
                        <div class="thumb">
                            <div class="profile-userpic mt-card-item">
                                <div class="avatar-view mt-card-avatar mt-overlay-1">
                                    <img src="<?php echo e($user->avatar_url); ?>" class="img-fluid" alt="avatar">
                                    <?php if($canChangeProfile): ?>
                                        <div class="mt-overlay">
                                            <ul class="mt-info">
                                                <li>
                                                    <a class="btn default btn-outline" href="javascript:;">
                                                        <i class="icon-note"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="mt-card-content">
                                    <h3 class="mt-card-name"><?php echo e($user->name); ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /profile links -->

            <?php if($canChangeProfile): ?>
                <div class="modal fade" id="avatar-modal" tabindex="-1" role="dialog" aria-labelledby="avatar-modal-label"
                     aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form class="avatar-form" method="post" action="<?php echo e(route('users.profile.image', $user->id)); ?>" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="avatar-modal-label"><i class="til_img"></i><strong><?php echo e(trans('core/acl::users.change_profile_image')); ?></strong></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">

                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="avatar-body">

                                        <!-- Upload image and data -->
                                        <div class="avatar-upload">
                                            <input class="avatar-src" name="avatar_src" type="hidden">
                                            <input class="avatar-data" name="avatar_data" type="hidden">
                                            <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>"/>
                                            <?php echo Form::token(); ?>

                                            <label for="avatarInput"><?php echo e(trans('core/acl::users.new_image')); ?></label>
                                            <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                                        </div>

                                        <div class="loading" tabindex="-1" role="img" aria-label="<?php echo e(trans('core/acl::users.loading')); ?>"></div>

                                        <!-- Crop and preview -->
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="avatar-wrapper"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="avatar-preview preview-lg"></div>
                                                <div class="avatar-preview preview-md"></div>
                                                <div class="avatar-preview preview-sm"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><?php echo e(trans('core/acl::users.close')); ?></button>
                                    <button class="btn btn-primary avatar-save" type="submit"><?php echo e(trans('core/acl::users.save')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.modal -->
            <?php endif; ?>

        </div>
        <div class="col-md-9 col-sm-7">
            <div class="profile-content">
                <div class="tabbable-custom">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#tab_1_1" class="nav-link active" data-bs-toggle="tab" aria-expanded="true"><?php echo e(trans('core/acl::users.info.title')); ?></a>
                        </li>
                        <?php if($canChangeProfile): ?>
                            <li class="nav-item">
                                <a href="#tab_1_3" class="nav-link" data-bs-toggle="tab" aria-expanded="false"><?php echo e(trans('core/acl::users.change_password')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php echo apply_filters(ACL_FILTER_PROFILE_FORM_TABS, null); ?>

                    </ul>
                    <div class="tab-content">
                    <!-- PERSONAL INFO TAB -->
                    <div class="tab-pane active" id="tab_1_1">
                        <?php echo $form; ?>

                    </div>
                    <!-- END PERSONAL INFO TAB -->
                    <!-- CHANGE PASSWORD TAB -->
                    <?php if($canChangeProfile): ?>
                        <div class="tab-pane" id="tab_1_3">
                            <?php echo $passwordForm; ?>

                        </div>
                    <?php endif; ?>
                    <!-- END CHANGE PASSWORD TAB -->
                    <?php echo apply_filters(ACL_FILTER_PROFILE_FORM_TAB_CONTENTS, null); ?>

                </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(BaseHelper::getAdminMasterLayoutTemplate(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/core/acl/resources/views/users/profile/base.blade.php ENDPATH**/ ?>