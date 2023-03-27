<?php if(count($sliders) > 0 && $sliders->loadMissing('metadata')): ?>
    <div class="ps-home-banner ps-home-banner--1">
        <div class="ps-container">
            <?php $ads = get_ads_keys_from_shortcode($shortcode); ?>
            <?php if(is_plugin_active('ads') && (AdsManager::locationHasAds('top-slider-image-1') || AdsManager::locationHasAds('top-slider-image-2') || count($ads))): ?>
                <div class="ps-section__left">
                    <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true"
                        data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true"
                        data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1"
                        data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1"
                        data-owl-duration="1000" data-owl-mousedrag="on"
                        data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
                        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="ps-banner bg--cover">
                                <?php
                                    $img = RvMedia::getImageUrl($slider->image, null, false, RvMedia::getDefaultImage());
                                    $tabletImage = $slider->getMetaData('tablet_image', true) ?: $img;
                                    $mobileImage = $slider->getMetaData('mobile_image', true) ?: $tabletImage;
                                ?>
                                <picture>
                                    <source srcset="<?php echo e($img); ?>" media="(min-width: 1200px)" />
                                    <source srcset="<?php echo e(RvMedia::getImageUrl($tabletImage)); ?>" media="(min-width: 768px)" />
                                    <source srcset="<?php echo e(RvMedia::getImageUrl($mobileImage)); ?>" media="(max-width: 767px)" />
                                    <img src="<?php echo e($img); ?>" alt="slider" />
                                </picture>
                                <?php if($slider->link): ?>
                                    <a class="ps-banner__overlay" href="<?php echo e(url($slider->link)); ?>"></a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="ps-section__right">
                    <?php if(count($ads)): ?>
                        <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="ps-collection">
                                <?php echo AdsManager::displayAds($key); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <?php if(AdsManager::locationHasAds('top-slider-image-1')): ?>
                            <div class="ps-collection">
                                <?php echo AdsManager::display('top-slider-image-1'); ?>

                            </div>
                        <?php endif; ?>
                        <?php if(AdsManager::locationHasAds('top-slider-image-2')): ?>
                            <div class="ps-collection">
                                <?php echo AdsManager::display('top-slider-image-2'); ?>

                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="ps-banner bg--cover" data-background="<?php echo e(RvMedia::getImageUrl($slider->image, null, false, RvMedia::getDefaultImage())); ?>">
                            <?php if($slider->link): ?>
                                <a class="ps-banner__overlay" href="<?php echo e(url($slider->link)); ?>"></a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/partials/short-codes/sliders.blade.php ENDPATH**/ ?>