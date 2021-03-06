<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    protected $fillable = [
        'vaccine_name',
        'vaccine_manufacturer',
        'vaccine_info',
        'vaccine_restriction',
    ];
}
