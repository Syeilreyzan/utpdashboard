<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlowControllerRecords extends Model
{
    use HasFactory;
    protected $fillable = ['flow_controller_type', 'flow_controller_value'];

    public function setFlowControllerRecordsTypeAttribute($value) {
        $allowedTypes = ['FC1', 'FC2'];

        // Ensure the value is one of the allowed types; otherwise, set a default value
        $this->attributes['flow_controller_type'] = in_array($value, $allowedTypes) ? $value : 'FC1';
    }
}
