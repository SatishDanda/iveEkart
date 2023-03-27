<li class="list-group-item">
    <?php echo Form::radio(Arr::get($attributes, 'name'), Arr::get($attributes, 'value'), Arr::get($attributes, 'checked'), $attributes); ?>

    <label for="<?php echo e(Arr::get($attributes, 'id')); ?>">
        <div>
            <span>
                <strong>   <?php echo e($dateRange); ?> ( <?php echo e(date("g:i a", strtotime($timeslotItem->start_time))); ?> - <?php echo e(date("g:i a", strtotime($timeslotItem->end_time))); ?>) </strong>
                <p class="text-success"  ><?php echo e($timeslotItem->time_delivery_quota); ?> Slots Avalible</p>
            </span>
        </div> 
    </label>
</li>  <?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\resources\views/custom/product/delivery-slot-checkbox.blade.php ENDPATH**/ ?>