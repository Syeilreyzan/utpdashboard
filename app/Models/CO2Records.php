<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CO2Records extends Model
{
    use HasFactory;
    protected $fillable = ['co2_type', 'co2_valaue'];

    public function setco2TypeAttribute($value) {
        $allowedTypes = ['CO2 1', 'CO2 2'];

        // Ensure the value is one of the allowed types; otherwise, set a default value
        $this->attributes['co2_type'] = in_array($value, $allowedTypes) ? $value : 'CO2 1';
    }
}
