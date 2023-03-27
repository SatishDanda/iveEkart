<div class="ps-page--single ps-page--vendor">
    <section class="ps-store-list">
        <div class="container">
            <?php $coverImage = $store->getMetadata('cover_image', true); ?>
            <aside class="ps-block--store-banner" <?php if($coverImage): ?> style="background-image: url(<?php echo e(RvMedia::getImageUrl($coverImage)); ?>); background-size: 100% auto;" <?php endif; ?>>
                <div class="ps-block__user" <?php if($coverImage): ?> style="background: rgba(0, 0, 0, 0.3)" <?php endif; ?>>
                    <div class="ps-block__user-avatar">
                        <img src="<?php echo e($store->logo_url); ?>" alt="<?php echo e($store->name); ?>">
                        <?php if(EcommerceHelper::isReviewEnabled()): ?>
                            <div class="rating_wrap">
                                <div class="rating">
                                    <div class="product_rate" style="width: <?php echo e($store->reviews()->avg('star') * 20); ?>%"></div>
                                </div>
                                <span class="rating_num">(<?php echo e($store->reviews()->count()); ?>)</span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="ps-block__user-content">
                        <h3 class="text-white"><?php echo e($store->name); ?></h3>
                        <p><i class="icon-map-marker" <?php if($coverImage): ?> style="color: #fff" <?php endif; ?>></i> <?php echo e($store->full_address); ?></p>
                        <?php if(!MarketplaceHelper::hideStorePhoneNumber() && $store->phone): ?>
                            <p><i class="icon-telephone" <?php if($coverImage): ?> style="color: #fff" <?php endif; ?>></i> <?php echo e($store->phone); ?></p>
                        <?php endif; ?>
                        <?php if(!MarketplaceHelper::hideStoreEmail() && $store->email): ?>
                            <p><i class="icon-envelope" <?php if($coverImage): ?> style="color: #fff" <?php endif; ?>></i> <a href="mailto:<?php echo e($store->email); ?>"><?php echo e($store->email); ?></a></p>
                        <?php endif; ?>
                    </div>
                </div>
            </aside>
            <div class="ps-section__wrapper">
                <div class="ps-shopping ps-tab-root">
                        <div class="ps-shopping__header">
                            <p><strong> <?php echo e($products->total()); ?></strong> <?php echo e(__('Products found')); ?></p>
                            <div class="ps-shopping__actions">
                                <div class="ps-shopping__view">
                                    <p><?php echo e(__('View')); ?></p>
                                    <ul class="ps-tab-list">
                                        <li class="active"><a href="#tab-1"><i class="icon-grid"></i></a></li>
                                        <li><a href="#tab-2"><i class="icon-list4"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <div class="ps-tabs">
                        <div class="ps-tab active" id="tab-1">
                            <div class="ps-shopping-product">
                                <div class="row">
                                    <?php if($products->count() > 0): ?>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                                <div class="ps-product">
                                                    <?php echo Theme::partial('product-item', compact('product')); ?>

                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="ps-pagination">
                                <?php echo $products->withQueryString()->links(); ?>

                            </div>
                        </div>
                        <div class="ps-tab" id="tab-2">
                            <div class="ps-shopping-product">
                                <?php if($products->count() > 0): ?>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="ps-product ps-product--wide">
                                            <?php echo Theme::partial('product-item-grid', compact('product')); ?>

                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                            <div class="ps-pagination">
                                <?php echo $products->withQueryString()->links(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/views/marketplace/store.blade.php ENDPATH**/ ?>