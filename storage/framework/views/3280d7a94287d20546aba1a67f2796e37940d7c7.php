
<?php if(isset($dateRange[$timeslotItem->delivery_day])): ?>
<li class="list-group-item">
    <?php echo Form::radio(Arr::get($attributes, 'name'), Arr::get($attributes, 'value'), Arr::get($attributes, 'checked'), $attributes); ?>

    <label for="<?php echo e(Arr::get($attributes, 'id')); ?>">
        <div>
            <span>
                <strong>   <?php echo e($dateRange[$timeslotItem->delivery_day]); ?> ( <?php echo e(date("g:i a", strtotime($timeslotItem->start_time))); ?> - <?php echo e(date("g:i a", strtotime($timeslotItem->end_time))); ?>)</strong>
            </span>
        </div> 
    </label>
</li> 

    <!-- <p style="color:red" > No Delivery Slots Avaliable </p> -->
<?php endif; ?><?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/orders/partials/delivery-slot.blade.php ENDPATH**/ ?>