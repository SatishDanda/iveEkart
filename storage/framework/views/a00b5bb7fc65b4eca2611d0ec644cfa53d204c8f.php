<div class="ps-download-app">
    <div class="ps-container">
        <div class="ps-block--download-app">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-block__thumbnail">
                            <img src="<?php echo e(RvMedia::getImageUrl($screenshot)); ?>" alt="screenshot">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-block__content">
                            <h3><?php echo BaseHelper::clean($title); ?></h3>
                            <?php if($description): ?>
                                <p><?php echo BaseHelper::clean($description); ?></p>
                            <?php endif; ?>
                            <?php if($subtitle): ?>
                                <p><?php echo BaseHelper::clean($subtitle); ?></p>
                            <?php endif; ?>
                            <form class="ps-form--download-app" action="<?php echo e(route('public.ajax.send-download-app-links')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="form-group--nest">
                                    <input class="form-control" type="email" name="email" placeholder="<?php echo e(__('Email Address')); ?>">
                                    <button class="ps-btn" type="submit"><?php echo e(__('Subscribe')); ?></button>
                                </div>
                            </form>
                            <?php if($androidAppUrl || $iosAppUrl): ?>
                                <p class="download-link">
                                    <?php if($androidAppUrl): ?>
                                        <a href="<?php echo e((string) $androidAppUrl); ?>"><img src="<?php echo e(Theme::asset()->url('img/google-play.png')); ?>" alt="<?php echo e(__('Google Play')); ?>"></a>
                                    <?php endif; ?>

                                    <?php if($iosAppUrl): ?>
                                        <a href="<?php echo e((string) $iosAppUrl); ?>"><img src="<?php echo e(Theme::asset()->url('img/app-store.png')); ?>" alt="<?php echo e(__('App Store')); ?>"></a>
                                    <?php endif; ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/partials/short-codes/download-app.blade.php ENDPATH**/ ?>