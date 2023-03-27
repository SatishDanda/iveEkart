<?php if($showLabel && $showField): ?>
    <?php if($options['wrapper'] !== false): ?>
        <div <?php echo $options['wrapperAttrs']; ?>>
            <?php endif; ?>
            <?php endif; ?>

            <?php if($showLabel && $options['label'] !== false && $options['label_show']): ?>
                <?php echo Form::customLabel($name, $options['label'], $options['label_attr']); ?>

            <?php endif; ?>

            <?php if($showField): ?>
                <div class="form-group mb-3 form-group-no-margin <?php if($errors->has($name)): ?> has-error <?php endif; ?>">
                    <div class="multi-choices-widget list-item-checkbox">
                        <ul>
                            <?php $__currentLoopData = Arr::get($options, 'choices', []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <input type="checkbox"
                                           class="styled"
                                           name="<?php echo e($name); ?>"
                                           value="<?php echo e($key); ?>"
                                           id="<?php echo e($name); ?>-item-<?php echo e($key); ?>"
                                           <?php if(in_array($key, Arr::get($options, 'value', []))): ?> checked="checked" <?php endif; ?>>
                                    <label for="<?php echo e($name); ?>-item-<?php echo e($key); ?>"><?php echo e($item); ?></label>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php echo $__env->make('core/base::forms.partials.help-block', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php echo $__env->make('core/base::forms.partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php if($showLabel && $showField): ?>
                <?php if($options['wrapper'] !== false): ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/core/base/resources/views/forms/fields/multi-check-list.blade.php ENDPATH**/ ?>