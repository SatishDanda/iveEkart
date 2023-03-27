<header class="header header--mobile" data-sticky="true">
    <div class="header__top">
        <div class="header__left">
            <p><?php echo e(theme_option('welcome_message')); ?></p>
        </div>
        <?php if(is_plugin_active('ecommerce')): ?>
            <div class="header__right">
                <ul class="navigation__extra">
                    <?php if(EcommerceHelper::isOrderTrackingEnabled()): ?>
                        <li><a href="<?php echo e(route('public.orders.tracking')); ?>"><?php echo e(__('Track your order')); ?></a></li>
                    <?php endif; ?>
                    <?php $currencies = get_all_currencies(); ?>
                    <?php if(count($currencies) > 1): ?>
                        <li>
                            <div class="ps-dropdown"><a href="#"><span><?php echo e(get_application_currency()->title); ?></span></a>
                                <ul class="ps-dropdown-menu">
                                    <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e(route('public.change-currency', $currency->title)); ?>"><span><?php echo e($currency->title); ?></span></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if(is_plugin_active('language')): ?>
                        <?php echo Theme::partial('language-switcher'); ?>

                    <?php endif; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
    <div class="navigation--mobile">
        <div class="navigation__left"><a class="ps-logo" href="<?php echo e(route('public.index')); ?>"><img src="<?php echo e(RvMedia::getImageUrl(theme_option('logo'))); ?>" alt="<?php echo e(theme_option('site_title')); ?>"></a></div>
        <?php if(is_plugin_active('ecommerce')): ?>
            <div class="navigation__right">
                <div class="header__actions">
                    <?php echo apply_filters('before_theme_header_mobile_actions', null); ?>

                    <div class="ps-cart--mini">
                        <a class="header__extra btn-shopping-cart" href="javascript:void(0)">
                            <i class="icon-bag2"></i><span><i><?php echo e(Cart::instance('cart')->count()); ?></i></span>
                        </a>
                        <div class="ps-cart--mobile">
                            <?php echo Theme::partial('cart'); ?>

                        </div>
                    </div>
                    <?php echo apply_filters('after_theme_header_mobile_actions', null); ?>

                    <div class="ps-block--user-header">
                        <div class="ps-block__left"><a href="<?php echo e(route('customer.overview')); ?>"><i class="icon-user"></i></a></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <?php if(is_plugin_active('ecommerce')): ?>
        <div class="ps-search--mobile">
            <form class="ps-form--search-mobile" action="<?php echo e(route('public.products')); ?>" data-ajax-url="<?php echo e(route('public.ajax.search-products')); ?>" method="get">
                <div class="form-group--nest position-relative">
                    <input class="form-control input-search-product" name="q" value="<?php echo e(BaseHelper::stringify(request()->query('q'))); ?>" type="text" autocomplete="off" placeholder="<?php echo e(__('Search something...')); ?>">
                    <div class="spinner-icon">
                        <i class="fa fa-spin fa-spinner"></i>
                    </div>
                    <button type="submit"><i class="icon-magnifier"></i></button>
                    <div class="ps-panel--search-result"></div>
                </div>
            </form>
        </div>
    <?php endif; ?>
</header>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/partials/header-mobile.blade.php ENDPATH**/ ?>