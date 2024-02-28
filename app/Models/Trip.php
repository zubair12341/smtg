<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable=['budget','departure','destination','user_id','start_date','end_date','status_by_driver','driver_id'];

    public function itineries()
    {
        return $this->hasMany(TripItinerary::class);
    }

    public function tripcom()
    {
        return $this->hasMany(TripComment::class);
    }
}
