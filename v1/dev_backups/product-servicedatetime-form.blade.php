@foreach($days as $key => $day)
<div class="row servicedatetime-group"> 
    <div class="col-md-3">  
    	<div class="storehouse-management">
        <div class="mt5">
           
            <label><input type="checkbox" class="storehouse-management-status"  value="{{$key}}" name="delivery_day[]"   @if (array_key_exists($key ,$product_days )) checked @endif> {{ $day }}</label>
        </div>
    </div>
    </div>       
    <div class="col-md-3">
         <div class="form-group mb-3">
                <label class="text-title-field">Start Time</label>
                <div class="next-input--stylized">
                    <input name="starttime[{{$key}}]"  class="next-input next-input--invisible" 
                          @if(isset($product_days[$key]))  value="{{$product_days[$key]->start_time}}" @else value="09:00" @endif 
                          type="time"
                           placeholder="Start Time">
                </div>
            </div>
    </div>
    <div class="col-md-3">
         <div class="form-group mb-3">
                <label class="text-title-field">End Time</label>
                <div class="next-input--stylized">
                    <input name="endtime[{{$key}}]"
                           class="next-input next-input--invisible" 
                             @if(isset($product_days[$key]))  value="{{$product_days[$key]->end_time}}" @else value="18:00" @endif 
                           type="time"
                           placeholder="End Time">
                </div>
            </div>
    </div>
    <div class="col-md-3">
     	<div class="form-group mb-3">
            <label class="text-title-field">Slots</label>
            <div class="next-input--stylized">
                <input name="slots[{{$key}}]"
                       class="next-input next-input--invisible" 
                       @if(isset($product_days[$key]))  value="{{$product_days[$key]->time_delivery_quota}}" @else value="" @endif 
                       type="text"
                       placeholder="Delivery Slots">
            </div>
        </div>
    </div>
</div> 
	 
@endforeach