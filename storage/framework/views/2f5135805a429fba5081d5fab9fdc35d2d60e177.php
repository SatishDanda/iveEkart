<a href="#" class="add-faq-schema-items <?php if($hasValue): ?> hidden <?php endif; ?>"><?php echo e(trans('plugins/faq::faq.add_item')); ?></a>

<div class="faq-schema-items <?php if(!$hasValue): ?> hidden <?php endif; ?>">
    <?php echo Form::repeater('faq_schema_config', $value, [
        [
            'type'       => 'textarea',
            'label'      => trans('plugins/faq::faq.question'),
            'label_attr' => ['class' => 'control-label required'],
            'attributes' => [
                'name'    => 'question',
                'value'   => null,
                'options' => [
                    'class'        => 'form-control',
                    'data-counter' => 1000,
                    'rows'         => 1,
                ],
            ],
        ],
        [
            'type'       => 'textarea',
            'label'      => trans('plugins/faq::faq.answer'),
            'label_attr' => ['class' => 'control-label required'],
            'attributes' => [
                'name'    => 'answer',
                'value'   => null,
                'options' => [
                    'class'        => 'form-control',
                    'data-counter' => 1000,
                    'rows'         => 1,
                ],
            ],
        ],
    ]); ?>

</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/faq/resources/views/schema-config-box.blade.php ENDPATH**/ ?>