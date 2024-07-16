<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NodeParameter extends Model
{
    use HasFactory;

    protected $fillable = [
        'node_id',
        'date_time',
        'current_value',
    ];

    public function node()
    {
        return $this->belongsTo(Node::class);
    }
}
