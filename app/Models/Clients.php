<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $fillable = [
        "client_firstname",
        "client_lastname",
        "client_address",
        "client_city",
        "client_state",
        "client_postalcode",
        "client_email",
        "client_phone",
    ];
}
