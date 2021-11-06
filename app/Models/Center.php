<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    protected $fillable = [
        'center_name',
        'center_location',
        'center_contact_number',
        'center_email',
        'opening_hours',
        'closing_hours',
    ];

    public function availableVaccines()
    {
        return $this->hasMany(AvailableVaccine::class);
    }
}
