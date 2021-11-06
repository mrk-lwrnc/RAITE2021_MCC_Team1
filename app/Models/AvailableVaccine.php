<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableVaccine extends Model
{
    use HasFactory;

    protected $fillable = [
        'center_id',
        'vaccine_name'
    ];

    public function center()
    {
        return $this->belongsTo(Center::class);
    }
}
