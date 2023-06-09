<?php
    Theme::set('stickyHeader', 'false');
    Theme::set('topHeader', Theme::partial('header-product-page', compact('product')));
    Theme::set('bottomFooter', Theme::partial('footer-product-page', compact('product')));
    Theme::set('pageId', 'product-page');
    Theme::set('headerMobile', Theme::partial('header-mobile-product'));
?>

<div class="ps-page--product">
    <div class="ps-container">
            <div class="ps-page__container">
                <div class="ps-page__left">
                    <div class="ps-product--detail ps-product--fullwidth">
                        <div class="ps-product__header">
                            <div class="ps-product__thumbnail" data-vertical="true">
                                <figure>
                                    <div class="ps-wrapper">
                                        <div class="ps-product__gallery" data-arrow="true">
                                            <?php $__currentLoopData = $productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="item">
                                                    <a href="<?php echo e(RvMedia::getImageUrl($img)); ?>">
                                                        <img src="<?php echo e(RvMedia::getImageUrl($img)); ?>" alt="<?php echo e($product->name); ?>"/>
                                                    </a>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </figure>
                                <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">
                                    <?php $__currentLoopData = $productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item">
                                            <img src="<?php echo e(RvMedia::getImageUrl($img, 'thumb')); ?>" alt="<?php echo e($product->name); ?>"/>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="ps-product__info">
                                <h1><?php echo BaseHelper::clean($product->name); ?></h1>
                                <div class="ps-product__meta">
                                    <?php if($product->brand_id): ?>
                                        <p><?php echo e(__('Brand')); ?>: <a href="<?php echo e($product->brand->url); ?>"><?php echo e($product->brand->name); ?></a></p>
                                    <?php endif; ?>

                                    <?php if(EcommerceHelper::isReviewEnabled()): ?>
                                        <?php if($product->reviews_count > 0): ?>
                                            <div class="rating_wrap">
                                                <a href="#tab-reviews">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width: <?php echo e($product->reviews_avg * 20); ?>%"></div>
                                                    </div>
                                                    <span class="rating_num">(<?php echo e($product->reviews_count); ?> <?php echo e(__('reviews')); ?>)</span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <h4 class="ps-product__price <?php if($product->front_sale_price !== $product->price): ?> sale <?php endif; ?>"><span><?php echo e(format_price($product->front_sale_price_with_taxes)); ?></span> <?php if($product->front_sale_price !== $product->price): ?> <del><?php echo e(format_price($product->price_with_taxes)); ?> </del> <?php endif; ?></h4>
                                <div class="ps-product__desc">
                                    <?php if(is_plugin_active('marketplace') && $product->store_id): ?>
                                        <p><?php echo e(__('Sold By')); ?>: <a href="<?php echo e($product->store->url); ?>"><strong><?php echo e($product->store->name); ?></strong></a></p>
                                    <?php endif; ?>

                                    <div class="ps-list--dot">
                                        <?php echo apply_filters('ecommerce_before_product_description', null, $product); ?>

                                        <?php echo BaseHelper::clean($product->description); ?>

                                        <?php echo apply_filters('ecommerce_after_product_description', null, $product); ?>

                                    </div>
                                </div>
                                <?php $flashSale = $product->latestFlashSales()->first(); ?>

                                <?php if($flashSale): ?>
                                    <div class="ps-product__countdown">
                                        <figure>
                                            <figcaption> <?php echo e(__("Don't Miss Out! This promotion will expires in")); ?></figcaption>
                                            <ul class="ps-countdown" data-time="<?php echo e($flashSale->end_date); ?>">
                                                <li><span class="days"></span>
                                                    <p><?php echo e(__('Days')); ?></p>
                                                </li>
                                                <li><span class="hours"></span>
                                                    <p><?php echo e(__('Hours')); ?></p>
                                                </li>
                                                <li><span class="minutes"></span>
                                                    <p><?php echo e(__('Minutes')); ?></p>
                                                </li>
                                                <li><span class="seconds"></span>
                                                    <p><?php echo e(__('Seconds')); ?></p>
                                                </li>
                                            </ul>
                                        </figure>
                                        <figure>
                                            <figcaption><?php echo e(__('Sold Items')); ?></figcaption>
                                            <div class="ps-product__progress-bar ps-progress" data-value="<?php echo e($flashSale->pivot->quantity > 0 ? ($flashSale->pivot->sold / $flashSale->pivot->quantity) * 100 : 0); ?>">
                                                <div class="ps-progress__value"><span style="width: <?php echo e($flashSale->pivot->quantity > 0 ? $flashSale->pivot->sold / $flashSale->pivot->quantity : 0); ?>%;"></span></div>
                                                <p><b><?php echo e($flashSale->pivot->sold); ?>/<?php echo e($flashSale->pivot->quantity); ?></b> <?php echo e(__('Sold')); ?></p>
                                            </div>
                                        </figure>
                                    </div>
                                <?php endif; ?>

                                <form class="add-to-cart-form" method="POST" action="<?php echo e(route('public.cart.add-to-cart')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php if($product->variations()->count() > 0): ?>
                                        <div class="pr_switch_wrap">
                                            <?php echo render_product_swatches($product, [
                                                'selected' => $selectedAttrs,
                                                'view'     => Theme::getThemeNamespace() . '::views.ecommerce.attributes.swatches-renderer'
                                            ]); ?>

                                        </div>
                                    <?php endif; ?>

                                    <?php echo render_product_options($product); ?>


                                    <div class="number-items-available mb-3">
                                        <?php if($product->isOutOfStock()): ?>
                                            <span class="text-danger">(<?php echo e(__('Out of stock')); ?>)</span>
                                        <?php else: ?>
                                            <?php if(!$productVariation): ?>
                                                <span class="text-danger">(<?php echo e(__('Not available')); ?>)</span>
                                            <?php else: ?>
                                                <?php if($productVariation->isOutOfStock()): ?>
                                                    <span class="text-danger">(<?php echo e(__('Out of stock')); ?>)</span>
                                                <?php elseif(!$productVariation->with_storehouse_management || $productVariation->quantity < 1): ?>
                                                    <span class="text-success">(<?php echo e(__('Available')); ?>)</span>
                                                <?php elseif($productVariation->quantity): ?>
                                                    <span class="text-success">
                                                    <?php if($productVariation->quantity != 1): ?>
                                                            (<?php echo e(__(':number products available', ['number' => $productVariation->quantity])); ?>)
                                                        <?php else: ?>
                                                            (<?php echo e(__(':number product available', ['number' => $productVariation->quantity])); ?>)
                                                        <?php endif; ?>
                                                </span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>

                                    <?php echo apply_filters(ECOMMERCE_PRODUCT_DETAIL_EXTRA_HTML, null, $product); ?>

                                    <div class="ps-product__shopping">
                                        <figure>
                                            <figcaption><?php echo e(__('Quantity')); ?></figcaption>
                                            <div class="form-group--number product__qty">
                                                <button class="up" type="button"><i class="icon-plus"></i></button>
                                                <button class="down" type="button"><i class="icon-minus"></i></button>
                                                <input class="form-control qty-input" type="number" name="qty" value="1" placeholder="1" min="1">
                                            </div>
                                        </figure>
                                        <input type="hidden" name="id" class="hidden-product-id" value="<?php echo e(($product->is_variation || !$product->defaultVariation->product_id) ? $product->id : $product->defaultVariation->product_id); ?>"/>

                                        <?php if(EcommerceHelper::isCartEnabled()): ?>
                                            <button class="ps-btn ps-btn--black add-to-cart-button <?php if($product->isOutOfStock()): ?> btn-disabled <?php endif; ?>" type="submit" name="add_to_cart" value="1" <?php if($product->isOutOfStock()): ?> disabled <?php endif; ?>><?php echo e(__('Add to cart')); ?></button>
                                            <?php if(EcommerceHelper::isQuickBuyButtonEnabled()): ?>
                                                <button class="ps-btn add-to-cart-button <?php if($product->isOutOfStock()): ?> btn-disabled <?php endif; ?>" type="submit" name="checkout" value="1" <?php if($product->isOutOfStock()): ?> disabled <?php endif; ?>><?php echo e(__('Buy Now')); ?></button>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <div class="ps-product__actions">
                                            <?php if(EcommerceHelper::isWishlistEnabled()): ?>
                                                <a class="js-add-to-wishlist-button" href="#" data-url="<?php echo e(route('public.wishlist.add', $product->id)); ?>"><i class="icon-heart"></i></a>
                                            <?php endif; ?>
                                            <?php if(EcommerceHelper::isCompareEnabled()): ?>
                                                <a class="js-add-to-compare-button" href="#" data-url="<?php echo e(route('public.compare.add', $product->id)); ?>" title="<?php echo e(__('Compare')); ?>"><i class="icon-chart-bars"></i></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </form>
                                <div class="ps-product__specification">

                                    <p <?php if(!$product->sku): ?> style="display: none" <?php endif; ?>><strong><?php echo e(__('SKU')); ?>:</strong> <span id="product-sku"><?php echo e($product->sku); ?></span></p>
                                    <?php if($product->categories->count()): ?>
                                        <p class="categories"><strong> <?php echo e(__('Categories')); ?>:</strong>
                                            <?php $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e($category->url); ?>"><?php echo BaseHelper::clean($category->name); ?></a><?php if(!$loop->last): ?>,<?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </p>
                                    <?php endif; ?>

                                    <?php if($product->tags->count()): ?>
                                        <p class="tags"><strong> <?php echo e(__('Tags')); ?>:</strong>
                                            <?php $__currentLoopData = $product->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e($tag->url); ?>"><?php echo e($tag->name); ?></a><?php if(!$loop->last): ?>,<?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <div class="ps-product__sharing">
                                    <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(url()->current())); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <a class="linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(urlencode(url()->current())); ?>&summary=<?php echo e(rawurldecode(strip_tags(SeoHelper::getDescription()))); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                                    <a class="twitter" href="https://twitter.com/intent/tweet?url=<?php echo e(urlencode(url()->current())); ?>&text=<?php echo e(strip_tags(SeoHelper::getDescription())); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <a class="whatsapp" href="https://wa.me/?text=<?php echo e(urlencode(url()->current())); ?>" title="<?php echo e(__('Share on WhatsApp')); ?>" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product__content ps-tab-root">
                            <ul class="ps-tab-list">
                                <li class="active"><a href="#tab-description"><?php echo e(__('Description')); ?></a></li>
                                <?php if(EcommerceHelper::isReviewEnabled()): ?>
                                    <li><a href="#tab-reviews"><?php echo e(__('Reviews')); ?> (<?php echo e($product->reviews_count); ?>)</a></li>
                                <?php endif; ?>
                                <?php if(is_plugin_active('marketplace') && $product->store_id): ?>
                                    <li><a href="#tab-vendor"><?php echo e(__('Vendor')); ?></a></li>
                                <?php endif; ?>
                                <?php if(is_plugin_active('faq')): ?>
                                    <?php if(count($product->faq_items) > 0): ?>
                                        <li><a href="#tab-faq"><?php echo e(__('Questions and Answers')); ?></a></li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </ul>
                            <div class="ps-tabs">
                                <div class="ps-tab active" id="tab-description">
                                    <div class="ps-document">
                                        <div>
                                            <?php echo BaseHelper::clean($product->content); ?>

                                        </div>
                                        <?php if(theme_option('facebook_comment_enabled_in_product', 'yes') == 'yes'): ?>
                                            <br />
                                            <?php echo apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, Theme::partial('comments')); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if(EcommerceHelper::isReviewEnabled()): ?>
                                    <div class="ps-tab" id="tab-reviews">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="ps-block--average-rating">
                                                    <div class="ps-block__header">
                                                        <h3><?php echo e(number_format($product->reviews_avg, 2)); ?></h3>
                                                        <?php if($product->reviews_count > 0): ?>
                                                            <div class="rating_wrap">
                                                                <div class="rating">
                                                                    <div class="product_rate" style="width: <?php echo e($product->reviews_avg * 20); ?>%"></div>
                                                                </div>
                                                                <span class="rating_num">(<?php echo e($product->reviews_count); ?> <?php echo e(__('reviews')); ?>)</span>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <?php $__currentLoopData = EcommerceHelper::getReviewsGroupedByProductId($product->id, $product->reviews_count); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="ps-block__star <?php if(!$item['count']): ?> disabled <?php endif; ?>" data-star="<?php echo e($item['star']); ?>">
                                                            <span><?php echo e(__(':star Star', ['star' => $item['star']])); ?></span>
                                                            <div class="ps-progress" data-value="<?php echo e($item['count']); ?>">
                                                                <span></span>
                                                            </div>
                                                            <span><?php echo e($item['percent']); ?>%</span>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <?php echo Form::open([
                                                        'route'  => 'public.reviews.create',
                                                        'method' => 'POST',
                                                        'class'  => 'ps-form--review form-review-product',
                                                        'files'  => true,
                                                    ]); ?>

                                                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                                    <h4><?php echo e(__('Submit Your Review')); ?></h4>
                                                    <?php if(!auth('customer')->check()): ?>
                                                        <p class="text-danger"><?php echo e(__('Please')); ?> <a href="<?php echo e(route('customer.login')); ?>"><?php echo e(__('login')); ?></a> <?php echo e(__('to write review!')); ?></p>
                                                    <?php endif; ?>
                                                    <div class="form-group form-group__rating">
                                                        <label for="review-star"><?php echo e(__('Your rating of this product')); ?></label>
                                                        <select name="star" class="ps-rating" data-read-only="false" id="review-star">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="comment" id="txt-comment" rows="6" placeholder="<?php echo e(__('Write your review')); ?>" <?php if(!auth('customer')->check()): ?> disabled <?php endif; ?>></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <script type="text/x-custom-template" id="review-image-template">
                                                            <span class="image-viewer__item" data-id="__id__">
                                                                <img src="<?php echo e(RvMedia::getDefaultImage()); ?>" alt="Preview" class="img-responsive d-block">
                                                                <span class="image-viewer__icon-remove">
                                                                    <i class="icon-cross-circle"></i>
                                                                </span>
                                                            </span>
                                                        </script>
                                                        <div class="image-upload__viewer d-flex">
                                                            <div class="image-viewer__list position-relative">
                                                                <div class="image-upload__uploader-container">
                                                                    <div class="d-table">
                                                                        <div class="image-upload__uploader">
                                                                            <i class="fa fa-image image-upload__icon"></i>
                                                                            <div class="image-upload__text"><?php echo e(__('Upload photos')); ?></div>
                                                                            <input type="file"
                                                                                name="images[]"
                                                                                data-max-files="<?php echo e(EcommerceHelper::reviewMaxFileNumber()); ?>"
                                                                                class="image-upload__file-input"
                                                                                accept="image/png,image/jpeg,image/jpg"
                                                                                multiple="multiple"
                                                                                data-max-size="<?php echo e(EcommerceHelper::reviewMaxFileSize(true)); ?>"
                                                                                data-max-size-message="<?php echo e(trans('validation.max.file', ['attribute' => '__attribute__', 'max' => '__max__'])); ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="loading">
                                                                    <div class="half-circle-spinner">
                                                                        <div class="circle circle-1"></div>
                                                                        <div class="circle circle-2"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="help-block">
                                                            <?php echo e(__('You can upload up to :total photos, each photo maximum size is :max kilobytes', [
                                                                    'total' => EcommerceHelper::reviewMaxFileNumber(),
                                                                    'max'   => EcommerceHelper::reviewMaxFileSize(true),
                                                                ])); ?>

                                                        </div>

                                                    </div>

                                                    <div class="form-group submit">
                                                        <button class="ps-btn <?php if(!auth('customer')->check()): ?> btn-disabled <?php endif; ?>" type="submit" <?php if(!auth('customer')->check()): ?> disabled <?php endif; ?>><?php echo e(__('Submit Review')); ?></button>
                                                    </div>
                                                <?php echo Form::close(); ?>

                                            </div>
                                        </div>

                                        <?php if($product->reviews_count): ?>
                                            <?php if(count($product->review_images)): ?>
                                                <div class="my-3">
                                                    <h4><?php echo e(__('Images from customer (:count)', ['count' => count($product->review_images)])); ?></h4>
                                                    <div class="block--review">
                                                        <div class="block__images row m-0 block__images_total">
                                                            <?php $__currentLoopData = $product->review_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <a href="<?php echo e(RvMedia::getImageUrl($img)); ?>" class="col-lg-1 col-sm-2 col-3 more-review-images <?php if($loop->iteration > 12): ?> d-none <?php endif; ?>">
                                                                    <div class="border position-relative rounded">
                                                                        <img src="<?php echo e(RvMedia::getImageUrl($img, 'thumb')); ?>" alt="<?php echo e($product->name); ?>" class="img-responsive rounded h-100">
                                                                        <?php if($loop->iteration == 12 && (count($product->review_images) - $loop->iteration > 0)): ?>
                                                                            <span>+<?php echo e(count($product->review_images) - $loop->iteration); ?></span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </a>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="block--product-reviews">
                                                        <div class="block__header d-md-flex align-items-center justify-content-between">
                                                            <div class="pb-4 pb-md-0">
                                                                <h2><?php echo e(__(':total review(s) for ":product"', [
                                                                        'total'   => $product->reviews_count,
                                                                        'product' => $product->name,
                                                                    ])); ?>

                                                                </h2>
                                                            </div>
                                                            <div class="ps-review__filter-by-star d-flex align-items-center justify-content-end">
                                                                <div class="px-2 d-flex align-items-center">
                                                                    <i class="icon-funnel"></i>
                                                                    <span><?php echo e(__('Filter')); ?>:</span>
                                                                </div>
                                                                <div class="ps-review__filter-select">
                                                                    <select class="ps-select">
                                                                        <option value="0"><?php echo e(__('All Star')); ?></option>
                                                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                                                            <option value="<?php echo e($i); ?>"><?php echo e(__(':star Star', ['star' => $i])); ?></option>
                                                                        <?php endfor; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block__content" id="app">
                                                            <product-reviews-component url="<?php echo e(route('public.ajax.product-reviews', $product->id)); ?>"></product-reviews-component>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if(is_plugin_active('marketplace') && $product->store_id): ?>
                                    <div class="ps-tab" id="tab-vendor">
                                        <h4><?php echo e($product->store->name); ?></h4>
                                        <div>
                                            <?php echo BaseHelper::clean($product->store->content); ?>

                                        </div>

                                        <a href="<?php echo e($product->store->url); ?>" class="more-products">
                                            <?php echo e(__('More Products from :store',  ['store' => $product->store->name])); ?>

                                        </a>
                                    </div>
                                <?php endif; ?>

                                <?php if(is_plugin_active('faq') && count($product->faq_items) > 0): ?>
                                    <div class="ps-tab" id="tab-faq">
                                        <div class="accordion" id="faq-accordion">
                                            <?php $__currentLoopData = $product->faq_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="card">
                                                    <div class="card-header" id="heading-faq-<?php echo e($loop->index); ?>">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link btn-block text-left <?php if(!$loop->first): ?> collapsed <?php endif; ?>" type="button" data-toggle="collapse" data-target="#collapse-faq-<?php echo e($loop->index); ?>" aria-expanded="true" aria-controls="collapse-faq-<?php echo e($loop->index); ?>">
                                                                <?php echo BaseHelper::clean($faq[0]['value']); ?>

                                                            </button>
                                                        </h2>
                                                    </div>

                                                    <div id="collapse-faq-<?php echo e($loop->index); ?>" class="collapse <?php if($loop->first): ?> show <?php endif; ?>" aria-labelledby="heading-faq-<?php echo e($loop->index); ?>" data-parent="#faq-accordion">
                                                        <div class="card-body">
                                                            <?php echo BaseHelper::clean($faq[1]['value']); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-page__right">
                    <aside class="widget widget_product widget_features">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <?php if(theme_option('product_feature_' . $i . '_title')): ?>
                                <p><i class="<?php echo e(theme_option('product_feature_' . $i . '_icon')); ?>"></i> <?php echo e(theme_option('product_feature_' . $i . '_title')); ?></p>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </aside>
                    <?php if(is_plugin_active('ads')): ?>
                        <aside class="widget">
                            <?php echo AdsManager::display('product-sidebar'); ?>

                        </aside>
                    <?php endif; ?>
                </div>
            </div>

            <?php
                $crossSellProducts = get_cross_sale_products($product, 7);
            ?>
            <?php if(count($crossSellProducts) > 0): ?>
                <?php echo Theme::partial('cross-sell-products', compact('crossSellProducts')); ?>

            <?php endif; ?>

            <div class="ps-section--default" id="products">
                <div class="ps-section__header">
                    <h3><?php echo e(__('Related products')); ?></h3>
                </div>
                <related-products-component url="<?php echo e(route('public.ajax.related-products', $product->id)); ?>?limit=6"></related-products-component>
            </div>
    </div>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/views/ecommerce/product.blade.php ENDPATH**/ ?>