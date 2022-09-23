<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'car_id', 'oil_changes', 'tire_rotations', 'tune_ups', 'repairs', 'price', 'notes'
    ];
    
    protected $casts = [
        'date_completed' => 'date:hh:mm'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
