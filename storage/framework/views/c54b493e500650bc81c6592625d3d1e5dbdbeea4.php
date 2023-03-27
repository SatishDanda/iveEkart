<?php if(!empty($locations)): ?>
    <div class="table-responsive">
        <table class="table text-start table-striped table-bordered">
            <tbody>
                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countryCode => $countryName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($countryName); ?></td>
                        <td class="text-end">
                            <button class="btn btn-info btn-import-location-data"
                                    data-url="<?php echo e(route('location.bulk-import.import-location-data', strtolower($countryCode))); ?>"
                                    type="button"><i
                                    class="fas fa-download"></i> <?php echo e(trans('plugins/location::bulk-import.import')); ?></button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <span class="d-inline-block"><?php echo e(trans('core/base::tables.no_data')); ?></span>
<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/location/resources/views/partials/available-remote-locations.blade.php ENDPATH**/ ?>