<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "client_id",
        "invoice_id",
        "vehicle",
        "mileage",
        "service",
        "description",
        "comment",
        "status",
        "price",
    ];
}
