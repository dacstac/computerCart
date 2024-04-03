<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    protected $table = "address";

    protected $fillable = [
        'id',
        'address',
        'cp',
        'city',
        'province',
        'country',
        'user_id',
    ];

    public $timestamps = false;

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
