<?php

namespace App\Models;

use App\Http\Enum\TransactionStatus;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'amount',
        'status',
    ];

    protected $casts = [
        'status' => TransactionStatus::class,
    ];
}
