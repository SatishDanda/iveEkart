<div class="text-center language-column">
    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!is_in_admin() || (Auth::check() && Auth::user()->hasPermission($route['edit']))): ?>
                <?php if($language->lang_code == Language::getDefaultLocaleCode()): ?>
                    <a href="<?php echo e(Route::has($route['edit']) ? route($route['edit'], $item->id) : '#'); ?>">
                        <i class="fa fa-check text-success"></i>
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(Route::has($route['edit']) ? route($route['edit'], $item->id) . '?ref_lang=' . $language->lang_code : '#'); ?>"
                       data-bs-toggle="tooltip"
                       title="<?php echo e(trans('plugins/language::language.edit_related')); ?>"
                    >
                        <i class="fa fa-edit"></i>
                    </a>
                <?php endif; ?>
        <?php else: ?>
            <i class="fa fa-check text-success"></i>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/language-advanced/resources/views/language-column.blade.php ENDPATH**/ ?>