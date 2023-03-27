@if(isset($dateRange[$timeslotItem->delivery_day]))
  
        <li class="list-group-item">
            {!! Form::radio(Arr::get($attributes, 'name'), Arr::get($attributes, 'value'), Arr::get($attributes, 'checked'), $attributes) !!}
            <label for="{{ Arr::get($attributes, 'id') }}">
                <div>
                    <span>
                        <strong>   {{ $dateRange[$timeslotItem->delivery_day] }} ( {{ date("g:i a", strtotime($timeslotItem->start_time))   }} - {{  date("g:i a", strtotime($timeslotItem->end_time)) }}) </strong>
                        <p class="text-success"  >{{ $timeslotItem->time_delivery_quota }} Slots Avalible</p>
                    </span>
                </div> 
            </label>
        </li> 
@else
<p style="color:red" > No Delivery Slots Avaliable </p> 
@endif