<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $fillable = [
        'user_id',
        'place_type',
        'food_type',
        'accomodation_type',
    ];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
