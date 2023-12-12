<?php

namespace App\Models;

use App\Http\Enum\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'status',
    ];

    protected $casts = [
        'status' => OrderStatus::class,
    ];
}
