<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "service_client_id",
        "service_vehicle",
        "service_mileage",
        "service_service",
        "service_comment",
        "service_price",
    ];
}
