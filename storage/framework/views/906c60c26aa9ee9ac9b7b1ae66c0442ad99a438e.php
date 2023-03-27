<?php
    $prefix = apply_filters(FILTER_SLUG_PREFIX, $prefix);
    $value = $value ?: old('slug');
    $endingURL = config('core.base.general.public_single_ending_url');
    $previewURL = str_replace('--slug--', $value, url($prefix) . '/' . config('packages.slug.general.pattern')) . $endingURL . (Auth::user() && $preview ? '?preview=true' : '');
?>

<div id="edit-slug-box" <?php if(empty($value) && !$errors->has($name)): ?> class="hidden" <?php endif; ?> data-field-name="<?php echo e(SlugHelper::getColumnNameToGenerateSlug($model)); ?>">
    <?php if(in_array(Route::currentRouteName(), ['pages.create', 'pages.edit']) && BaseHelper::isHomepage(Route::current()->parameter('page'))): ?>
        <label class="control-label" for="current-slug"><?php echo e(trans('core/base::forms.permalink')); ?>:</label>
        <span id="sample-permalink" class="d-inline-block" dir="ltr">
            <a class="permalink" target="_blank" href="<?php echo e(route('public.index')); ?>">
                <span class="default-slug"><?php echo e(route('public.index')); ?></span>
            </a>
        </span>
    <?php else: ?>

        <label class="control-label <?php if($editable): ?> required <?php endif; ?>" for="current-slug"><?php echo e(trans('core/base::forms.permalink')); ?>:</label>
        <span id="sample-permalink" class="d-inline-block" dir="ltr">
            <a class="permalink" target="_blank" href="<?php echo e($previewURL); ?>">
                <span class="default-slug"><?php echo e(url($prefix)); ?>/<span id="editable-post-name"><?php echo e($value); ?></span><?php echo e($endingURL); ?></span>
            </a>
        </span>

        <?php if($editable): ?>
            <span id="edit-slug-buttons">
                <button type="button" class="btn btn-secondary" id="change_slug"><?php echo e(trans('core/base::forms.edit')); ?></button>
                <button type="button" class="save btn btn-secondary" id="btn-ok"><?php echo e(trans('core/base::forms.ok')); ?></button>
                <button type="button" class="cancel button-link"><?php echo e(trans('core/base::forms.cancel')); ?></button>
                <?php if(Auth::user() && $preview && $id): ?>
                    <a class="btn btn-info btn-preview" target="_blank" href="<?php echo e($previewURL); ?>"><?php echo e(trans('packages/slug::slug.preview')); ?></a>
                <?php endif; ?>
            </span>

            <input type="hidden" id="current-slug" name="<?php echo e($name); ?>" value="<?php echo e($value); ?>">
            <div data-url="<?php echo e(route('slug.create')); ?>" data-view="<?php echo e(rtrim(str_replace('--slug--', '', url($prefix) . '/' . config('packages.slug.general.pattern')), '/') . '/'); ?>" id="slug_id" data-id="<?php echo e($id ?: 0); ?>"></div>
            <input type="hidden" name="slug_id" value="<?php echo e($id ?: 0); ?>">
            <input type="hidden" name="is_slug_editable" value="1">
        <?php endif; ?>
    <?php endif; ?>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/packages/slug/resources/views/permalink.blade.php ENDPATH**/ ?>