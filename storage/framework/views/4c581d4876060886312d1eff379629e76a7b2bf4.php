<?php
    SeoHelper::setTitle(__('404 - Not found'));
    Theme::fireEventGlobalAssets();
?>

<?php echo Theme::partial('header'); ?>


<div class="ps-page--404">
    <div class="container">
        <div class="ps-section__content mt-40 mb-40">
            <img src="<?php echo e(Theme::asset()->url('img/404.jpg')); ?>" alt="404">
            <h3><?php echo e(__('Ohh! Page not found')); ?></h3>
            <p><?php echo e(__("It seems we can't find what you're looking for. Perhaps searching can help or go back to")); ?><a href="<?php echo e(route('public.index')); ?>"> <?php echo e(__('Homepage')); ?></a></p>

            <?php if(is_plugin_active('ecommerce')): ?>
                <form class="ps-form--widget-search" action="<?php echo e(route('public.products')); ?>" method="get">
                    <input class="form-control" type="text" name="q" placeholder="<?php echo e(__('Search...')); ?>">
                    <button><i class="icon-magnifier"></i></button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php echo Theme::partial('footer'); ?>



<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/views/404.blade.php ENDPATH**/ ?>