<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title> <?php echo $__env->yieldContent('title', __('Checkout')); ?> </title>

    <?php if(theme_option('favicon')): ?>
        <link rel="shortcut icon" href="<?php echo e(RvMedia::getImageUrl(theme_option('favicon'))); ?>">
    <?php endif; ?>

    <?php echo Html::style('vendor/core/core/base/libraries/font-awesome/css/fontawesome.min.css'); ?>

    <?php echo Html::style('vendor/core/plugins/ecommerce/css/front-theme.css?v=1.2.0'); ?>


    <?php if(BaseHelper::siteLanguageDirection() == 'rtl'): ?>
        <?php echo Html::style('vendor/core/plugins/ecommerce/css/front-theme-rtl.css?v=1.2.0'); ?>

    <?php endif; ?>

    <?php echo Html::style('vendor/core/core/base/libraries/toastr/toastr.min.css'); ?>


    <?php echo Html::script('vendor/core/plugins/ecommerce/js/checkout.js?v=1.2.0'); ?>


    <?php if(EcommerceHelper::loadCountriesStatesCitiesFromPluginLocation()): ?>
        <script src="<?php echo e(asset('vendor/core/plugins/location/js/location.js')); ?>?v=1.2.0"></script>
    <?php endif; ?>

    <?php echo apply_filters('ecommerce_checkout_header', null); ?>


    <?php echo $__env->yieldPushContent('header'); ?>
</head>
<body class="checkout-page" <?php if(BaseHelper::siteLanguageDirection() == 'rtl'): ?> dir="rtl" <?php endif; ?>>
    <?php echo apply_filters('ecommerce_checkout_body', null); ?>

    <div class="checkout-content-wrap">
        <div class="container">
            <div class="row">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>

    <?php echo $__env->yieldPushContent('footer'); ?>

    <?php echo Html::script('vendor/core/plugins/ecommerce/js/utilities.js'); ?>

    <?php echo Html::script('vendor/core/core/base/libraries/toastr/toastr.min.js'); ?>


    <script type="text/javascript">
        window.messages = {
            error_header: '<?php echo e(__('Error')); ?>',
            success_header: '<?php echo e(__('Success')); ?>',
        }
    </script>

    <?php if(session()->has('success_msg') || session()->has('error_msg') || isset($errors)): ?>
        <script type="text/javascript">
            $(document).ready(function () {
                <?php if(session()->has('success_msg')): ?>
                    MainCheckout.showNotice('success', '<?php echo e(session('success_msg')); ?>');
                <?php endif; ?>
                <?php if(session()->has('error_msg')): ?>
                    MainCheckout.showNotice('error', '<?php echo e(session('error_msg')); ?>');
                <?php endif; ?>
                <?php if(isset($errors)): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        MainCheckout.showNotice('error', '<?php echo e($error); ?>');
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            });
        </script>
    <?php endif; ?>

    <?php echo apply_filters('ecommerce_checkout_footer', null); ?>


</body>
</html>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/orders/master.blade.php ENDPATH**/ ?>