<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Salon extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
