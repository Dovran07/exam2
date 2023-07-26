<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Location extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function salon(): HasOne
    {
        return $this->hasOne(Salon::class);
    }
}
