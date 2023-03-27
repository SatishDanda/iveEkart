<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <?php echo BaseHelper::googleFonts('https://fonts.googleapis.com/css2?family=' . urlencode(theme_option('primary_font', 'Work Sans')) . ':wght@300;400;500;600;700&display=swap'); ?>


        <style>
            :root {
                --color-1st: <?php echo e(theme_option('primary_color', '#fcb800')); ?>;
                --color-2nd: <?php echo e(theme_option('secondary_color', '#222222')); ?>;
                --primary-font: '<?php echo e(theme_option('primary_font', 'Work Sans')); ?>', sans-serif;
                --button-text-color: <?php echo e(theme_option('button_text_color', '#000')); ?>;
                --header-text-color: <?php echo e(theme_option('header_text_color', '#000')); ?>;
                --header-button-background-color: <?php echo e(theme_option('header_button_background_color', '#000')); ?>;
                --header-button-text-color: <?php echo e(theme_option('header_button_text_color', '#fff')); ?>;
                --header-text-hover-color: <?php echo e(theme_option('header_text_hover_color', '#fff')); ?>;
                --header-text-accent-color: <?php echo e(theme_option('header_text_accent_color', '#222222')); ?>;
                --header-diliver-border-color: <?php echo e(BaseHelper::hexToRgba(theme_option('header_text_color', '#000'), 0.15)); ?>;
            }
        </style>

        <?php
            Theme::asset()->remove('language-css');
            Theme::asset()->container('footer')->remove('language-public-js');
            Theme::asset()->container('footer')->remove('simple-slider-owl-carousel-css');
            Theme::asset()->container('footer')->remove('simple-slider-owl-carousel-js');
            Theme::asset()->container('footer')->remove('simple-slider-css');
            Theme::asset()->container('footer')->remove('simple-slider-js');
        ?>

        <?php echo Theme::header(); ?>

    </head>
    <body <?php if(Theme::get('pageId')): ?> id="<?php echo e(Theme::get('pageId')); ?>" <?php endif; ?> <?php if(BaseHelper::siteLanguageDirection() == 'rtl'): ?> dir="rtl" <?php endif; ?>>
        <?php echo apply_filters(THEME_FRONT_BODY, null); ?>

        <div id="alert-container"></div>

        <?php if(theme_option('preloader_enabled', 'no') == 'yes'): ?>
            <div id="loader-wrapper">
                <div class="preloader-loading"></div>
                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>
            </div>
        <?php endif; ?>

        <?php echo Theme::get('topHeader'); ?>


        <header class="header header--1" data-sticky="<?php echo e(Theme::get('stickyHeader', 'true')); ?>">
            <div class="header__top">
                <div class="ps-container">
                    <div class="header__left">
                        <div class="menu--product-categories">
                            <div class="menu__toggle"><i class="icon-menu"></i><span> <?php echo e(__('Shop by Department')); ?></span></div>
                            <div class="menu__content" style="display: none">
                                <ul class="menu--dropdown">
                                    <?php echo $categoriesDropdown ?? null; ?>

                                </ul>
                            </div>
                        </div><a class="ps-logo" href="<?php echo e(route('public.index')); ?>"><img src="<?php echo e(RvMedia::getImageUrl(theme_option('logo'))); ?>" alt="<?php echo e(theme_option('site_title')); ?>" height="40"></a>
                    </div>
                    <?php if(is_plugin_active('ecommerce')): ?>
                        <div class="header__center">
                            <form class="ps-form--quick-search" action="<?php echo e(route('public.products')); ?>" data-ajax-url="<?php echo e(route('public.ajax.search-products')); ?>" method="get">
                                <div class="form-group--icon">
                                    <div class="product-cat-label"><?php echo e(__('All')); ?></div>
                                    <select class="form-control product-category-select" name="categories[]">
                                        <option value="0"><?php echo e(__('All')); ?></option>
                                        <?php echo Theme::partial('product-categories-select', ['categories' => $categories, 'indent' => null]); ?>

                                    </select>
                                </div>
                                <input class="form-control input-search-product" name="q" type="text" placeholder="<?php echo e(__("I'm shopping for...")); ?>" autocomplete="off">
                                <div class="spinner-icon">
                                    <i class="fa fa-spin fa-spinner"></i>
                                </div>
                                <button type="submit"><?php echo e(__('Search')); ?></button>
                                <div class="ps-panel--search-result"></div>
                            </form>
                        </div>
                        <div class="header__right">
                            <div class="header__actions">
                                <?php echo apply_filters('before_theme_header_actions', null); ?>

                                <?php if(EcommerceHelper::isCompareEnabled()): ?>
                                    <a class="header__extra btn-compare" href="<?php echo e(route('public.compare')); ?>"><i class="icon-chart-bars"></i><span><i><?php echo e(Cart::instance('compare')->count()); ?></i></span></a>
                                <?php endif; ?>
                                <?php if(EcommerceHelper::isWishlistEnabled()): ?>
                                    <a class="header__extra btn-wishlist" href="<?php echo e(route('public.wishlist')); ?>"><i class="icon-heart"></i><span><i><?php echo e(!auth('customer')->check() ? Cart::instance('wishlist')->count() : auth('customer')->user()->wishlist()->count()); ?></i></span></a>
                                <?php endif; ?>
                                <?php if(EcommerceHelper::isCartEnabled()): ?>
                                    <div class="ps-cart--mini">
                                        <a class="header__extra btn-shopping-cart" href="<?php echo e(route('public.cart')); ?>"><i class="icon-bag2"></i><span><i><?php echo e(Cart::instance('cart')->count()); ?></i></span></a>
                                        <div class="ps-cart--mobile">
                                            <?php echo Theme::partial('cart'); ?>

                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php echo apply_filters('after_theme_header_actions', null); ?>

                                <div class="ps-block--user-header">
                                    <div class="ps-block__left"><i class="icon-user"></i></div>
                                    <div class="ps-block__right">
                                        <?php if(auth('customer')->check()): ?>
                                            <a href="<?php echo e(route('customer.overview')); ?>" class="customer-name"><?php echo e(auth('customer')->user()->name); ?></a>
                                            <a href="<?php echo e(route('customer.logout')); ?>"><?php echo e(__('Logout')); ?></a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('customer.login')); ?>"><?php echo e(__('Login')); ?></a><a href="<?php echo e(route('customer.register')); ?>"><?php echo e(__('Register')); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <nav class="navigation">
                <div class="ps-container">
                    <div class="navigation__left">
                        <div class="menu--product-categories">
                            <div class="menu__toggle"><i class="icon-menu"></i><span> <?php echo e(__('Shop by Department')); ?></span></div>
                            <div class="menu__content" style="display: none">
                                <ul class="menu--dropdown">
                                    <?php echo $categoriesDropdown ?? null; ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="navigation__right">
                        <?php echo Menu::renderMenuLocation('main-menu', [
                            'view'    => 'menu',
                            'options' => ['class' => 'menu'],
                        ]); ?>

                        <?php if(is_plugin_active('ecommerce')): ?>
                            <ul class="navigation__extra">
                                <?php if(is_plugin_active('marketplace')): ?>
                                    <li><a href="<?php echo e(!auth('customer')->check() ? route('customer.register') : (auth('customer')->user()->is_vendor ? route('marketplace.vendor.dashboard') : route('marketplace.vendor.become-vendor'))); ?>"><?php echo e(__('Sell On Martfury')); ?></a></li>
                                <?php endif; ?>
                                <?php if(EcommerceHelper::isOrderTrackingEnabled()): ?>
                                    <li><a href="<?php echo e(route('public.orders.tracking')); ?>"><?php echo e(__('Track your order')); ?></a></li>
                                <?php endif; ?>
                                <?php $currencies = get_all_currencies(); ?>
                                <?php if(count($currencies) > 1): ?>
                                    <li>
                                        <div class="ps-dropdown">
                                            <a href="<?php echo e(route('public.change-currency', get_application_currency()->title)); ?>"><span><?php echo e(get_application_currency()->title); ?></span></a>
                                            <ul class="ps-dropdown-menu">
                                                <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($currency->id !== get_application_currency_id()): ?>
                                                        <li><a href="<?php echo e(route('public.change-currency', $currency->title)); ?>"><span><?php echo e($currency->title); ?></span></a></li>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </li>
                                <?php endif; ?>
                                <?php if(is_plugin_active('language')): ?>
                                    <?php echo Theme::partial('language-switcher'); ?>

                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </header>
        <?php if(Theme::get('headerMobile')): ?>
            <?php echo Theme::get('headerMobile'); ?>

        <?php else: ?>
            <?php echo Theme::partial('header-mobile'); ?>

        <?php endif; ?>
        <?php if(is_plugin_active('ecommerce')): ?>
            <div class="ps-panel--sidebar" id="cart-mobile" style="display: none">
                <div class="ps-panel__header">
                    <h3><?php echo e(__('Shopping Cart')); ?></h3>
                </div>
                <div class="navigation__content">
                    <div class="ps-cart--mobile">
                        <?php echo Theme::partial('cart'); ?>

                    </div>
                </div>
            </div>
            <div class="ps-panel--sidebar" id="navigation-mobile" style="display: none">
                <div class="ps-panel__header">
                    <h3><?php echo e(__('Categories')); ?></h3>
                </div>
                <div class="ps-panel__content">
                    <ul class="menu--mobile">
                        <?php echo $categoriesDropdown ?? null; ?>

                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <div class="navigation--list">
            <div class="navigation__content">
                <a class="navigation__item ps-toggle--sidebar" href="#menu-mobile"><i class="icon-menu"></i><span> <?php echo e(__('Menu')); ?></span></a>
                <a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="icon-list4"></i><span> <?php echo e(__('Categories')); ?></span></a>
                <a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="icon-magnifier"></i><span> <?php echo e(__('Search')); ?></span></a>
                <a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="icon-bag2"></i><span> <?php echo e(__('Cart')); ?></span></a></div>
        </div>

        <?php if(is_plugin_active('ecommerce')): ?>
            <div class="ps-panel--sidebar" id="search-sidebar" style="display: none">
                <div class="ps-panel__header">
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
                <div class="navigation__content"></div>
            </div>
        <?php endif; ?>
        <div class="ps-panel--sidebar" id="menu-mobile" style="display: none">
            <div class="ps-panel__header">
                <h3><?php echo e(__('Menu')); ?></h3>
            </div>
            <div class="ps-panel__content">
                <?php echo Menu::renderMenuLocation('main-menu', [
                    'view'    => 'menu',
                    'options' => ['class' => 'menu--mobile'],
                ]); ?>


                <ul class="menu--mobile menu--mobile-extra">
                    <?php if(is_plugin_active('ecommerce')): ?>
                        <?php if(EcommerceHelper::isOrderTrackingEnabled()): ?>
                            <li><a href="<?php echo e(route('public.orders.tracking')); ?>"><i class="icon-check-square"></i> <?php echo e(__('Track your order')); ?></a></li>
                        <?php endif; ?>
                        <?php if(EcommerceHelper::isCompareEnabled()): ?>
                            <li><a href="<?php echo e(route('public.compare')); ?>"><i class="icon-chart-bars"></i> <span><?php echo e(__('Compare')); ?></span></a></li>
                        <?php endif; ?>
                        <?php if(EcommerceHelper::isWishlistEnabled()): ?>
                            <li><a href="<?php echo e(route('public.wishlist')); ?>"><i class="icon-heart"></i> <span><?php echo e(__('Wishlist')); ?></span></a></li>
                        <?php endif; ?>
                        <?php if(count($currencies) > 1): ?>
                            <li class="menu-item-has-children">
                                <a href="#"><span><?php echo e(get_application_currency()->title); ?></span></a>
                                <span class="sub-toggle"></span>
                                <ul class="sub-menu">
                                    <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($currency->id !== get_application_currency_id()): ?>
                                            <li><a href="<?php echo e(route('public.change-currency', $currency->title)); ?>"><span><?php echo e($currency->title); ?></span></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if(is_plugin_active('language')): ?>
                        <?php
                            $supportedLocales = Language::getSupportedLocales();
                        ?>

                        <?php if($supportedLocales && count($supportedLocales) > 1): ?>
                            <?php
                                $languageDisplay = setting('language_display', 'all');
                            ?>
                            <li class="menu-item-has-children">
                                <a href="#">
                                    <?php if($languageDisplay == 'all' || $languageDisplay == 'flag'): ?>
                                        <?php echo language_flag(Language::getCurrentLocaleFlag(), Language::getCurrentLocaleName()); ?>

                                    <?php endif; ?>
                                    <?php if($languageDisplay == 'all' || $languageDisplay == 'name'): ?>
                                        <?php echo e(Language::getCurrentLocaleName()); ?>

                                    <?php endif; ?>
                                </a>
                                <span class="sub-toggle"></span>
                                <ul class="sub-menu">
                                    <?php $__currentLoopData = $supportedLocales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($localeCode != Language::getCurrentLocale()): ?>
                                            <li>
                                                <a href="<?php echo e(Language::getSwitcherUrl($localeCode, $properties['lang_code'])); ?>">
                                                    <?php if($languageDisplay == 'all' || $languageDisplay == 'flag'): ?><?php echo language_flag($properties['lang_flag'], $properties['lang_name']); ?><?php endif; ?>
                                                    <?php if($languageDisplay == 'all' || $languageDisplay == 'name'): ?><span><?php echo e($properties['lang_name']); ?></span><?php endif; ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/partials/header.blade.php ENDPATH**/ ?>