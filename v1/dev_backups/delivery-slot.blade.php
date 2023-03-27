@php
$startDate = new DateTime();  
$dates = []; 
$arrayDates = App\Models\Deliverydays::pluck('id','delivery_day');
for ($d = 1; $d <= 7; $d++) { 
    $dynamic =   $startDate->add(new DateInterval("P1D")) ; 
    $dates[$arrayDates[$dynamic->format('l')]] = $dynamic->format('d-m-Y');  
}  
@endphp      
@if(count($product->timeslots) > 0)
<div class="row"> 
    <h6>{{ __('Delivery Slot') }}</h6>                             
    <div class="payment-checkout-form">   
            <ul class="list-group list_payment_method"> 
                @foreach ($product->timeslots as $key => $Items)
                    @if ($Items->time_delivery_quota > 0)
                        @include('custom/product/delivery-slot-checkbox', [
                            'timeslotItem' => $Items,
                            'dateRange' =>   $dates,
                            'attributes' =>[
                                'id' => 'timeslot_method_' . $Items->id,
                                'name' => 'timeslot_method[' . $product->id .']',
                                'class' => 'magic-radio', 
                                'data-option' => $Items->id,
                                'value' => $Items->id,
                                'checked' => $product->timeslots[0]->id == $Items->id
                            ],
                        ])
                    @endif
                @endforeach


            </ul>
    </div> 
</div>
@endif