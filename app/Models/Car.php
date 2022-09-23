<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'make', 'model', 'year', 'colour'
    ];

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }

}
