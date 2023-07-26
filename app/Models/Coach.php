<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Coach extends Model
{
    use HasFactory;


    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function days(): BelongsTo
    {
        return $this->belongsTo(Days::class);
    }
}
