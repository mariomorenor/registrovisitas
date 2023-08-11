<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $casts = [
        'datetime' => 'datetime',
    ];

    function record() {
        return $this->belongsTo(Record::class);
    }
}
