<?php if(!empty($urls)): ?>
    <?php $__currentLoopData = $urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <link rel="alternate" href="<?php echo e($item['url']); ?>" hreflang="<?php echo e($item['lang_code']); ?>" />
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <?php $__currentLoopData = Language::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($localeCode != Language::getCurrentLocale()): ?>
            <link rel="alternate" href="<?php echo e(Language::getLocalizedURL($localeCode, url()->current(), [], false)); ?>" hreflang="<?php echo e($localeCode); ?>" />
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/language/resources/views/partials/hreflang.blade.php ENDPATH**/ ?>