<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'vehicle_client_id',
        'vehicle_model_id',
        'vehicle_plate',
        'vehicle_color',
    ];
}
