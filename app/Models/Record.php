<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $guarded = [];

    function teen() {
        return $this->belongsTo(Teen::class);
    }
}
