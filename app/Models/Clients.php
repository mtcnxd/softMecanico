<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $fillable = [
        "firstname",
        "lastname",
        "city",
        "postalcode",
        "address1",
        "address2",
        "email",
        "phone",
        "comment"
    ];
}
