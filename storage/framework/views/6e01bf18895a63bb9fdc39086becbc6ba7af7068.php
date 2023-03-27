<?php if(theme_option('favicon')): ?>
    <link rel="shortcut icon" href="<?php echo e(RvMedia::getImageUrl(theme_option('favicon'))); ?>">
<?php endif; ?>

<?php echo SeoHelper::render(); ?>


<?php echo Theme::asset()->styles(); ?>

<?php echo Theme::asset()->container('after_header')->styles(); ?>

<?php echo Theme::asset()->container('header')->scripts(); ?>


<?php echo apply_filters(THEME_FRONT_HEADER, null); ?>


<script>
    window.siteUrl = "<?php echo e(route('public.index')); ?>";
</script>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/packages/theme/resources/views/partials/header.blade.php ENDPATH**/ ?>