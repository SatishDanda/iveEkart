<div class="row my-2 box-table-shipping input-shipping-sync-wrapper box-table-shipping-item-<?php echo e($rule ? $rule->id : 0); ?>">
    <div class="col-12">
        <div class="accordion" id="accordion-rule-<?php echo e($rule->id); ?>">
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading-rule-<?php echo e($rule->id); ?>">
                    <button class="accordion-button collapsed px-3 py-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-rule-<?php echo e($rule->id); ?>" aria-expanded="false" aria-controls="collapse-rule-<?php echo e($rule->id); ?>">
                        <div class="row w-100">
                            <div class="col">
                                <span class="fw-bold label-rule-item-name"><?php echo e($rule->name); ?></span>
                                <div class="small mt-1">
                                    <?php if($rule->type->allowRuleItems()): ?>
                                        <span><?php echo e($rule->type->label()); ?></span>
                                    <?php else: ?>
                                        <span class="rule-to-value-missing <?php if($rule->to): ?> hidden <?php endif; ?>"><?php echo e(trans('plugins/ecommerce::shipping.greater_than')); ?></span>
                                        <span>
                                            <span class="from-value-label"><?php echo e($rule->type->toUnitText($rule->from)); ?></span>
                                        </span>
                                        <span class="rule-to-value-wrap <?php if(!$rule->to): ?> hidden <?php endif; ?>">
                                            <span class="m-1">-</span>
                                            <span>
                                                <span class="to-value-label"><?php echo e($rule->type->toUnitText($rule->to)); ?></span>
                                            </span>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-auto d-flex align-items-center">
                                <label class="py-1 px-2">
                                    <span>
                                        <span class="rule-price-item"><?php echo e(format_price($rule->price ?? 0)); ?></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="collapse-rule-<?php echo e($rule->id); ?>" class="accordion-collapse collapse" aria-labelledby="heading-rule-<?php echo e($rule->id); ?>"
                    data-bs-parent="#accordion-rule-<?php echo e($rule->id); ?>">
                    <div class="accordion-body shipping-detail-information">
                        <?php echo $__env->make('plugins/ecommerce::shipping.rules.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php if($rule && $rule->type->allowRuleItems() &&
                            Auth::user()->hasPermission('ecommerce.shipping-rule-items.index')): ?>
                            <?php echo $__env->make('plugins/ecommerce::shipping.items.index', ['total' => $rule->items_count], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/shipping/rules/item.blade.php ENDPATH**/ ?>