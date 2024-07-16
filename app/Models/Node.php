<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipment_label',
        'equipment_type',
        'max_value',
        'min_value',
        'unit_of_measurement',
        'csv_file_location',
    ];

    public function nodeParameter()
    {
        return $this->hasMany(NodeParameter::class, 'node_id');
    }

    public function latestNodeParameter()
    {
        return $this->hasOne(NodeParameter::class)->latestOfMany()->first();
    }
}
