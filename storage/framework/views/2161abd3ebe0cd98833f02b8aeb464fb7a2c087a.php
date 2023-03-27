<?php
$startDate = new DateTime();  
$dates = []; 
$dates_test = []; 
$arrayDates = App\Models\Deliverydays::pluck('id','delivery_day');
for ($d = 1; $d <= 7; $d++) { 
    $dynamic =   $startDate->add(new DateInterval("P1D")) ; 
    $dates[$arrayDates[$dynamic->format('l')] .'_'.'date'] = $dynamic->format('d-m-Y');    
}
?>      
<?php if(count($product->timeslots) > 0): ?>
<div class="row"> 
    <h6><?php echo e(__('Delivery Slot')); ?></h6>   
    <div class="payment-checkout-form">   
            <ul class="list-group list_payment_method"> 
                <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $product->timeslots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t => $Item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <?php if($Item->delivery_day .'_'.'date' == $key && $Item->time_delivery_quota > 0): ?>
                        <?php echo $__env->make('custom/product/delivery-slot-checkbox', [
                            'timeslotItem' => $Item,
                            'dateRange' =>   $date,
                            'attributes' =>[
                                'id' => 'timeslot_method_' . $Item->id,
                                'name' => 'timeslot_method[' . $product->id .']',
                                'class' => 'magic-radio', 
                                'data-option' => $Item->id,
                                'value' => $Item->id,
                                'checked' => $Item->delivery_day .'_'.'date' == array_key_first($dates) 
                            ],
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
    </div> 
</div>
<?php endif; ?><?php /**PATH D:\Projects\xampp8\htdocs\iveEkart\resources\views/custom/product/delivery-slot.blade.php ENDPATH**/ ?>