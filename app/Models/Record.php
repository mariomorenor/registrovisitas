<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $guarded = ['files'];

    function teen() {
        return $this->belongsTo(Teen::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function visits() {
        return $this->hasMany(Visit::class);
    }
}
