<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Salon extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;

    protected $fillable = [
        'name',
        'location_id',
    ];


    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function client(): HasMany
    {
        return $this->hasMany(Client::class);
    }
}
