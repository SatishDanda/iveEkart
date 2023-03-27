<?php if($showStart): ?>
    <?php echo Form::open(Arr::except($formOptions, ['template'])); ?>

<?php endif; ?>

<div class="form-body">
    <?php if($showFields): ?>
        <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!in_array($field->getName(), $exclude)): ?>
                <?php echo $field->render(); ?>

            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>

<?php if($showEnd): ?>
    <?php echo Form::close(); ?>

<?php endif; ?>

<?php if($form->getValidatorClass()): ?>
    <?php $__env->startPush('footer'); ?>
        <?php echo $form->renderValidatorJs(); ?>

    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/core/base/resources/views/forms/form-content-only.blade.php ENDPATH**/ ?>