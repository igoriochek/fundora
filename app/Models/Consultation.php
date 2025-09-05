<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = [
        'name',
        'phone_number',
        'email'
    ];

    protected $casts = [
        'name' => 'string',
        'phone_number' => 'string',
        'email' => 'string'
    ];
}
