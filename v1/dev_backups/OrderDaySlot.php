<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDaySlot extends Model
{
    use HasFactory;

    protected $table = 'order_day_slots';

    public $timestamps = true;

    protected $fillable = [
        'order_id', 
        'product_time_slot_id',
        'delivery_day_id',
        'product_id',
        'day'
    ];

}
