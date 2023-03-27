@php
$startDate = new DateTime();  
$dates = []; 
$dates_test = []; 
$arrayDates = App\Models\Deliverydays::pluck('id','delivery_day');
for ($d = 1; $d <= 7; $d++) { 
    $dynamic =   $startDate->add(new DateInterval("P1D")) ; 
    $dates[$arrayDates[$dynamic->format('l')] .'_'.'date'] = $dynamic->format('d-m-Y');    
}
@endphp      
@if(count($product->timeslots) > 0)
<div class="row"> 
    <h6>{{ __('Delivery Slot') }}</h6>   
    <div class="payment-checkout-form">   
            <ul class="list-group list_payment_method"> 
                @foreach ($dates as $key => $date)
                    @foreach($product->timeslots as $t => $Item) 
                    @if ($Item->delivery_day .'_'.'date' == $key && $Item->time_delivery_quota > 0)
                        @include('custom/product/delivery-slot-checkbox', [
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
                        ])
                    @endif
                    @endforeach
                @endforeach
            </ul>
    </div> 
</div>
@endif