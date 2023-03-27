<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTimeSlots extends Model
{
    use HasFactory;

    protected $table = 'product_time_slots';

    protected $fillable = [
        'delivery_day',
        'start_time',
        'end_time',
        'time_delivery_quota',
        'product_id',
        'status', 
    ];


    
}
 