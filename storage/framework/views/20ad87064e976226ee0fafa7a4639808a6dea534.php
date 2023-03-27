<form action="<?php echo e($rule ? route('shipping_methods.region.rule.update', $rule->id) : route('shipping_methods.region.rule.create')); ?>"
    method="<?php echo e($rule ? 'PUT' : 'POST'); ?>">
    <div class="panel panel-default bg-aliceBlue content-box mb-0">
        <div class="panel-body">
            <div class="mb-3">
                <label class="text-title-field required"><?php echo e(trans('plugins/ecommerce::shipping.shipping_rule_name')); ?></label>
                <input type="text" name="name" class="next-input input-sync-text-item"
                    data-target=".label-rule-item-name" value="<?php echo e($rule ? $rule->name : null); ?>">
            </div>
            <div class="flexbox-grid-default">
                <div class="flexbox-content-no-padding">
                    <div class="mb-3">
                        <label class="text-title-field required"><?php echo e(trans('plugins/ecommerce::shipping.type')); ?></label>
                        <?php echo Form::customSelect('type', ['' => trans('plugins/ecommerce::shipping.rule.select_type')] + \Botble\Ecommerce\Enums\ShippingRuleTypeEnum::availableLabels($rule ? $rule->shipping : null), $rule ? $rule->type : '', ['class' => 'select-rule-type'], \Botble\Ecommerce\Enums\ShippingRuleTypeEnum::toSelectAttributes()); ?>

                    </div>
                </div>
                <div class="flexbox-content-no-padding pl15 rule-from-to-inputs <?php if($rule && ! $rule->type->showFromToInputs()): ?> d-none <?php endif; ?>">
                    <div class="mb-3">
                        <label class="text-title-field rule-from-to-label">
                            <?php echo e($rule ? $rule->type->label() : \Botble\Ecommerce\Enums\ShippingRuleTypeEnum::BASED_ON_PRICE()->label()); ?>

                        </label>
                        <div class="flexbox-grid-default flexbox-align-items-center">
                            <div class="flexbox-auto-content">
                                <div class="next-input--stylized">
                                    <span class="next-input-add-on next-input__add-on--before unit-item-label">
                                        <?php echo e($rule ? $rule->type->toUnit() : \Botble\Ecommerce\Enums\ShippingRuleTypeEnum::BASED_ON_PRICE()->toUnit()); ?>

                                    </span>
                                    <input type="text" name="from"
                                        class="next-input input-mask-number next-input--invisible input-sync-item"
                                        data-target=".from-value-label"
                                        value="<?php echo e($rule ? $rule->from : 0); ?>">
                                </div>
                            </div>
                            <div class="flexbox-auto-left pl5 p-r5">
                                <span class="inline">—</span>
                            </div>
                            <div class="flexbox-auto-content">
                                <div class="next-input--stylized">
                                    <span class="next-input-add-on next-input__add-on--before unit-item-label">
                                        <?php echo e($rule ? $rule->type->toUnit() : \Botble\Ecommerce\Enums\ShippingRuleTypeEnum::BASED_ON_PRICE()->toUnit()); ?>

                                    </span>
                                    <input type="text" name="to"
                                        class="next-input input-mask-number next-input--invisible input-sync-item input-to-value-field"
                                        data-target=".to-value-label"
                                        value="<?php echo e($rule && $rule->to != 0 ? $rule->to : null); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flexbox-grid-default">
                <div class="flexbox-content-no-padding">
                    <div class="form-group mb-3">
                        <label class="text-title-field required"><?php echo e(trans('plugins/ecommerce::shipping.shipping_fee')); ?></label>
                        <div class="next-input--stylized">
                            <span class="next-input-add-on next-input__add-on--before"><?php echo e(get_application_currency()->symbol); ?></span>
                            <input type="text" name="price"
                                class="next-input input-mask-number next-input--invisible input-sync-item base-price-rule-item"
                                data-thousands-separator="<?php echo e(EcommerceHelper::getThousandSeparatorForInputMask()); ?>"
                                data-decimal-separator="<?php echo e(EcommerceHelper::getDecimalSeparatorForInputMask()); ?>"
                                data-target=".rule-price-item" value="<?php echo e($rule ? $rule->price : 0); ?>">
                        </div>
                    </div>
                </div>
                <div class="flexbox-content-no-padding pl15"></div>
            </div>
            <?php if($rule): ?>
                <div class="panel-footer overflow-hidden">
                    <div class="float-start">
                        <button class="btn btn-secondary btn-destroy btn-confirm-delete-price-item-modal-trigger"
                            data-name="<?php echo e($rule->name); ?>"
                            data-id="<?php echo e($rule->id); ?>"><?php echo e(trans('plugins/ecommerce::shipping.delete')); ?></button>
                    </div>
                    <div class="float-end inline">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#collapse-rule-<?php echo e($rule->id); ?>"
                            class="btn btn-secondary"><?php echo e(trans('plugins/ecommerce::shipping.cancel')); ?></button>
                        <button class="btn btn-primary btn-save-rule"><?php echo e(trans('plugins/ecommerce::shipping.save')); ?></button>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</form>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/shipping/rules/form.blade.php ENDPATH**/ ?>