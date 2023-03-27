<?php if(Arr::get($metaBox, 'before_wrapper')): ?>
    <?php echo Arr::get($metaBox, 'before_wrapper'); ?>

<?php endif; ?>

<?php if(Arr::get($metaBox, 'wrap', true)): ?>
    <div class="widget meta-boxes" <?php echo Html::attributes(Arr::get($metaBox, 'attributes', [])); ?>>
        <div class="widget-title">
            <h4>
                <span> <?php echo e(Arr::get($metaBox, 'title')); ?></span>
            </h4>
        </div>
        <div class="widget-body">
            <?php echo Arr::get($metaBox, 'content'); ?>

        </div>
    </div>
<?php else: ?>
    <?php echo Arr::get($metaBox, 'content'); ?>

<?php endif; ?>

<?php if(Arr::get($metaBox, 'after_wrapper')): ?>
    <?php echo Arr::get($metaBox, 'after_wrapper'); ?>

<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/core/base/resources/views/forms/partials/meta-box.blade.php ENDPATH**/ ?>