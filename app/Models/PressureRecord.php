<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PressureRecord extends Model
{
    use HasFactory;
    protected $fillable = ['pressure_type', 'pressure_value'];

    public function setPressureTypeAttribute($value) {
        $allowedTypes = ['P1', 'P2', 'P3', 'P4'];

        // Ensure the value is one of the allowed types; otherwise, set a default value
        $this->attributes['pressure_type'] = in_array($value, $allowedTypes) ? $value : 'P1';
    }
}
