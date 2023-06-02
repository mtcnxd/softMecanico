<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'client_id',
        'model_id',
        'color',
        'plate',
        'comment'
    ];
}
