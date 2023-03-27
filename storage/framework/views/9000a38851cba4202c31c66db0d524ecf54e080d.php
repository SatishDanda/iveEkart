<?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="row servicedatetime-group"> 
    <div class="col-md-3">  
    	<div class="storehouse-management">
        <div class="mt5">
           
            <label><input type="checkbox" class="storehouse-management-status"  value="<?php echo e($key); ?>" name="delivery_day[]"   <?php if(array_key_exists($key ,$product_days )): ?> checked <?php endif; ?>> <?php echo e($day); ?></label>
        </div>
    </div>
    </div>       
    <div class="col-md-3">
         <div class="form-group mb-3">
                <label class="text-title-field">Start Time</label>
                <div class="next-input--stylized">
                    <input name="starttime[<?php echo e($key); ?>]"  class="next-input next-input--invisible" 
                          <?php if(isset($product_days[$key])): ?>  value="<?php echo e($product_days[$key]->start_time); ?>" <?php else: ?> value="09:00" <?php endif; ?> 
                          type="time"
                           placeholder="Start Time">
                </div>
            </div>
    </div>
    <div class="col-md-3">
         <div class="form-group mb-3">
                <label class="text-title-field">End Time</label>
                <div class="next-input--stylized">
                    <input name="endtime[<?php echo e($key); ?>]"
                           class="next-input next-input--invisible" 
                             <?php if(isset($product_days[$key])): ?>  value="<?php echo e($product_days[$key]->end_time); ?>" <?php else: ?> value="18:00" <?php endif; ?> 
                           type="time"
                           placeholder="End Time">
                </div>
            </div>
    </div>
    <div class="col-md-3">
     	<div class="form-group mb-3">
            <label class="text-title-field">Slots</label>
            <div class="next-input--stylized">
                <input name="slots[<?php echo e($key); ?>]"
                       class="next-input next-input--invisible" 
                       <?php if(isset($product_days[$key])): ?>  value="<?php echo e($product_days[$key]->time_delivery_quota); ?>" <?php else: ?> value="" <?php endif; ?> 
                       type="text"
                       placeholder="Delivery Slots">
            </div>
        </div>
    </div>
</div> 
	 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\platform/plugins/ecommerce/resources/views/products/partials/product-servicedatetime-form.blade.php ENDPATH**/ ?>