<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemperatureRecord extends Model
{
    use HasFactory;
    protected $fillable = ['temperature_type', 'temperature_value'];

    public function setTemperatureTypeAttribute($value) {
        $allowedTypes = ['T1', 'T2'];

        // Ensure the value is one of the allowed types; otherwise, set a default value
        $this->attributes['temperature_type'] = in_array($value, $allowedTypes) ? $value : 'T1';
    }
}
