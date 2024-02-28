<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverDetail extends Model
{
    protected $fillable = [
        'user_id','age', 'cnic', 'address', 'location', 'driver_personal_info',
        'price_per_day', 'vehicle_type', 'availability', 'model', 'manufacturer'
    ];

    protected $casts = [
        'driver_personal_info' => 'json',
    ];
}
