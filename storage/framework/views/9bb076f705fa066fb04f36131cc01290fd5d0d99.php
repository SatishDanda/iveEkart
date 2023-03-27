<?php
$languages = Language::getActiveLanguage(['lang_id', 'lang_name', 'lang_code', 'lang_flag']);
?>

<?php if(count($languages) > 1): ?>
    <span class="admin-list-language-chooser">
        <span><?php echo e(trans('plugins/language::language.translations')); ?>: </span>
        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($language->lang_code !== Language::getCurrentAdminLocaleCode()): ?>
                <span>
                    <?php echo language_flag($language->lang_flag, $language->lang_name); ?>

                    <a href="<?php echo e(route($route, $language->lang_code == Language::getDefaultLocaleCode() ? [] : ['ref_lang' => $language->lang_code])); ?>"><?php echo e($language->lang_name); ?></a>
                </span>&nbsp;
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <input type="hidden" name="ref_lang" value="<?php echo e(BaseHelper::stringify(request()->input('ref_lang'))); ?>">
    </span>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/language/resources/views/partials/admin-list-language-chooser.blade.php ENDPATH**/ ?>