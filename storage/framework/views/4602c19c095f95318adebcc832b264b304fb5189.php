<?php $__env->startSection('content'); ?>
    <div class="ps-section__header">
        <h3></h3>
        <div class="float-left">
            <h3><?php echo e(SeoHelper::getTitle()); ?></h3>
        </div>
        <div class="float-right">
            <a class="add-address ps-btn ps-btn--sm ps-btn--small" href="<?php echo e(route('customer.address.create')); ?>">
                <span><?php echo e(__('Add a new address')); ?></span>
            </a>
        </div>
    </div>
    <div class="ps-section__content">
        <div class="table-responsive">
            <table class="table ps-table--wishlist">
                <thead>
                <tr>
                    <th><?php echo e(__('Address')); ?></th>
                    <th><?php echo e(__('Is default?')); ?></th>
                    <th><?php echo e(__('Actions')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php if(count($addresses) > 0): ?>
                    <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="dashboard-address-item">
                            <td style="white-space: inherit;">
                                <p><?php echo e($address->name); ?>, <?php echo e($address->address); ?>, <?php echo e($address->city); ?>, <?php echo e($address->state); ?><?php if(EcommerceHelper::isUsingInMultipleCountries()): ?>, <?php echo e($address->country_name); ?> <?php endif; ?> <?php if(EcommerceHelper::isZipCodeEnabled()): ?>, <?php echo e($address->zip_code); ?> <?php endif; ?> - <?php echo e($address->phone); ?></p>
                            </td>
                            <td style="width: 120px;">
                                <?php if($address->is_default): ?> <?php echo e(__('Yes')); ?> <?php else: ?> <?php echo e(__('No')); ?> <?php endif; ?>
                            </td>
                            <td style="width: 140px;">
                                <a class="ps-btn ps-btn--sm ps-btn--small" href="<?php echo e(route('customer.address.edit', $address->id)); ?>"><?php echo e(__('Edit')); ?></a>
                                <a class="ps-btn ps-btn--sm ps-btn--small btn-trigger-delete-address"
                                   href="#" data-url="<?php echo e(route('customer.address.destroy', $address->id)); ?>"><?php echo e(__('Remove')); ?></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center"><?php echo e(__('No address!')); ?></td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="mt-3 justify-content-center pagination_style1">
            <?php echo $addresses->links(); ?>

        </div>
    </div>

    <div class="modal fade" id="confirm-delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong><?php echo e(__('Confirm delete')); ?></strong></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p><?php echo e(__('Do you really want to delete this address?')); ?></p>
                </div>
                <div class="modal-footer">
                    <button class="ps-btn ps-btn--sm ps-btn--gray" type="button" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                    <button class="ps-btn ps-btn--sm avatar-save btn-confirm-delete" type="submit"><?php echo e(__('Delete')); ?></button>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make(Theme::getThemeNamespace() . '::views.ecommerce.customers.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/themes/martfury/views/ecommerce/customers/address/list.blade.php ENDPATH**/ ?>