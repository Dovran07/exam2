<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'birthday' => 'date',
    ];

    protected $fillable = [
        'name',
        'surname',
        'birthday',
        'gender',
        'salon_id',
        'membership_id',
        'coach_id',
        'days_id',
    ];


    public function salon(): BelongsTo
    {
        return $this->belongsTo(Salon::class);
    }


    public function membership(): BelongsTo
    {
        return $this->belongsTo(Membership::class);
    }


    public function coach(): BelongsTo
    {
        return $this->belongsTo(Coach::class);
    }


    public function days(): BelongsTo
    {
        return $this->belongsTo(Days::class);
    }
}
