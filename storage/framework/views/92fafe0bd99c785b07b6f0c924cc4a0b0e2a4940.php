<?php if(Auth::user()->hasPermission('products.edit')): ?>
    <a data-type="text" data-pk="<?php echo e($item->id); ?>" data-url="<?php echo e(route('products.update-order-by')); ?>" data-value="<?php echo e($item->order ?? 0); ?>" data-title="<?php echo e(trans('core/base::tables.order')); ?>" class="editable" href="#"><?php echo e($item->order ?? 0); ?></a>
<?php else: ?>
    <?php echo e($item->order); ?>

<?php endif; ?>
<?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/products/partials/sort-order.blade.php ENDPATH**/ ?>