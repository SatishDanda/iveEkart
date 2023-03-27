<div class="ps-page--shop">
    <div <?php if(Route::currentRouteName() == 'public.products'): ?> id="app" <?php endif; ?>>
        <?php if(theme_option('show_featured_brands_on_products_page', 'yes') == 'yes' &&  Route::currentRouteName() == 'public.products'): ?>
            <div class="mt-40">
                <featured-brands-component url="<?php echo e(route('public.ajax.featured-brands')); ?>"></featured-brands-component>
            </div>
        <?php endif; ?>
        <div class="ps-layout--shop">
            <div class="ps-layout__left">
                <div class="screen-darken"></div>
                <div class="ps-layout__left-container">
                    <div class="ps-filter__header d-block d-xl-none">
                        <h3><?php echo e(__('Filter Products')); ?></h3><a class="ps-btn--close ps-btn--no-border" href="#"></a>
                    </div>
                    <div class="ps-layout__left-content">
                        <form action="<?php echo e(URL::current()); ?>" data-action="<?php echo e(route('public.products')); ?>" method="GET" id="products-filter-form">
                            <?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.includes.filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="ps-layout__right">
                <?php if(theme_option('show_recommend_items_on_products_page', 'yes') == 'yes' && Route::currentRouteName() == 'public.products'): ?>
                    <div class="ps-block--shop-features">
                        <div class="ps-block__header">
                            <h3><?php echo e(__('Recommended Items')); ?></h3>
                            <div class="ps-block__navigation">
                                <a class="ps-carousel__prev" href="#recommended-products">
                                    <i class="icon-chevron-left"></i>
                                </a>
                                <a class="ps-carousel__next" href="#recommended-products">
                                    <i class="icon-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ps-block__content">
                            <featured-products-component url="<?php echo e(route('public.ajax.featured-products')); ?>" :id="'recommended-products'"></featured-products-component>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="ps-shopping ps-tab-root">
                    <div class="bg-light py-2 mb-3">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-3 d-xl-none px-2 px-sm-3">
                                    <div class="header__filter d-xl-none mx-auto mb-3 mb-sm-0">
                                        <button id="products-filter-sidebar" type="button">
                                            <i class="icon-equalizer"></i><span class="ml-2"><?php echo e(__('Filter')); ?></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-6 d-none d-md-block">
                                    <div class="products-found pt-3">
                                        <strong><?php echo e($products->total()); ?></strong><span class="ml-1"><?php echo e(__('Products found')); ?></span>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 px-2 px-sm-3">
                                    <div class="d-flex justify-content-center justify-content-sm-end">
                                        <?php echo $__env->make(Theme::getThemeNamespace() . '::views/ecommerce/includes/sort', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <div class="ps-shopping__view ml-2">
                                            <ul class="products-layout mb-0 p-0">
                                                <li <?php if(request()->get('layout') != 'list'): ?> class="active" <?php endif; ?>><a href="#grid" data-layout="grid"><i class="icon-grid"></i></a></li>
                                                <li <?php if(request()->get('layout') == 'list'): ?> class="active" <?php endif; ?>><a href="#list" data-layout="list"><i class="icon-list4"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-tabs ps-products-listing">
                        <?php echo $__env->make(Theme::getThemeNamespace('views.ecommerce.includes.product-items'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo apply_filters('ecommerce_after_product_listing'); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/views/ecommerce/products.blade.php ENDPATH**/ ?>