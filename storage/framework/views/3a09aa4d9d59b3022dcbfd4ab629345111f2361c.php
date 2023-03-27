 <section class="ps-section--account crop-avatar customer-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="ps-section__left">
                    <aside class="ps-widget--account-dashboard">
                        <div class="ps-widget__header">
                            <form id="avatar-upload-form" enctype="multipart/form-data" action="javascript:void(0)" onsubmit="return false">
                                <div class="avatar-upload-container">
                                    <div id="account-avatar">
                                        <div class="profile-image">
                                            <div class="avatar-view mt-card-avatar">
                                                <img class="br2" src="<?php echo e(auth('customer')->user()->avatar_url); ?>" alt="<?php echo e(auth('customer')->user()->name); ?>">
                                                <div class="mt-overlay br2">
                                                    <span><i class="fa fa-edit"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <figure>
                                <figcaption><?php echo e(__('Hello')); ?></figcaption>
                                <p><?php echo e(auth('customer')->user()->name); ?></p>
                            </figure>
                        </div>
                        <div class="ps-widget__content">
                            <ul>
                                <li <?php if(Route::currentRouteName() == 'customer.overview'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('customer.overview')); ?>"><i class="icon-user"></i> <?php echo e(__('Account Information')); ?></a></li>
                                <li <?php if(Route::currentRouteName() == 'customer.edit-account'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('customer.edit-account')); ?>"><i class="icon-pencil"></i> <?php echo e(__('Update profile')); ?></a></li>
                                <li <?php if(Route::currentRouteName() == 'customer.orders' || Route::currentRouteName() == 'customer.orders.view'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('customer.orders')); ?>"><i class="icon-papers"></i> <?php echo e(__('Orders')); ?></a></li>
                                <?php if(EcommerceHelper::isEnabledSupportDigitalProducts()): ?>
                                    <li <?php if(Route::currentRouteName() == 'customer.downloads'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('customer.downloads')); ?>"><i class="icon-papers"></i> <?php echo e(__('Downloads')); ?></a></li>
                                <?php endif; ?>
                                <li <?php if(Route::currentRouteName() == 'customer.order_returns' || Route::currentRouteName() == 'customer.order_returns.view'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('customer.order_returns')); ?>"><i class="icon-cart-remove"></i> <?php echo e(__('Order return requests')); ?></a></li>
                                <li <?php if(Route::currentRouteName() == 'customer.address' || Route::currentRouteName() == 'customer.address.create' || Route::currentRouteName() == 'customer.address.edit'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('customer.address')); ?>"><i class="icon-map-marker"></i> <?php echo e(__('Address')); ?></a></li>
                                <li <?php if(Route::currentRouteName() == 'customer.change-password'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('customer.change-password')); ?>"><i class="icon-lock"></i> <?php echo e(__('Change password')); ?></a></li>
                                <?php if(is_plugin_active('marketplace')): ?>
                                    <?php if(auth('customer')->user()->is_vendor): ?>
                                        <li><a href="<?php echo e(route('marketplace.vendor.dashboard')); ?>"><i class="icon-cart"></i> <?php echo e(__('Vendor dashboard')); ?></a></li>
                                    <?php else: ?>
                                        <li <?php if(Route::currentRouteName() == 'marketplace.vendor.become-vendor'): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('marketplace.vendor.become-vendor')); ?>"><i class="icon-cart"></i> <?php echo e(__('Become a vendor')); ?></a></li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <li><a href="<?php echo e(route('customer.logout')); ?>"><i class="icon-power-switch"></i><?php echo e(__('Logout')); ?></a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="ps-section__right">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>

        <div class="modal fade" id="avatar-modal" tabindex="-1" role="dialog" aria-labelledby="avatar-modal-label"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="avatar-form" method="post" action="<?php echo e(route('customer.avatar')); ?>" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title" id="avatar-modal-label"><i class="til_img"></i><strong><?php echo e(__('Profile Image')); ?></strong></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">

                            <div class="avatar-body">

                                <!-- Upload image and data -->
                                <div class="avatar-upload">
                                    <input class="avatar-src" name="avatar_src" type="hidden">
                                    <input class="avatar-data" name="avatar_data" type="hidden">
                                    <?php echo csrf_field(); ?>

                                    <label for="avatarInput"><?php echo e(__('New image')); ?></label>
                                    <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                                </div>

                                <div class="loading" tabindex="-1" role="img" aria-label="<?php echo e(__('Loading')); ?>"></div>

                                <!-- Crop and preview -->
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="avatar-wrapper"></div>
                                        <div class="error-message text-danger" style="display: none"></div>
                                    </div>
                                    <div class="col-md-3 avatar-preview-wrapper">
                                        <div class="avatar-preview preview-lg"></div>
                                        <div class="avatar-preview preview-md"></div>
                                        <div class="avatar-preview preview-sm"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="ps-btn ps-btn--sm ps-btn--gray" type="button" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                            <button class="ps-btn ps-btn--sm avatar-save" type="submit"><?php echo e(__('Save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.modal -->
    </div>
</section>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/views/ecommerce/customers/master.blade.php ENDPATH**/ ?>