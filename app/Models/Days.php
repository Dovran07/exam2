<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Days extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;



    public function membership(): HasMany
    {
        return $this->hasMany(Membership::class);
    }

    public function coach(): HasMany
    {
        return $this->hasMany(Coach::class);
    }

    public function Client(): HasMany
    {
        return $this->hasMany(Client::class);
    }

}
