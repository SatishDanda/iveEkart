<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliverydays extends Model
{
    use HasFactory;

    protected $table = 'delivery_days';

    protected $fillable = [
        'delivery_day', 
    ];
 
}
