<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Membership extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function days(): BelongsTo
    {
        return $this->belongsTo(Days::class);
    }
}
