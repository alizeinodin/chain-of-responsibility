<?php

namespace App\Http\Enum;

enum OrderStatus: string
{
    const PENDING = 'pending';
    const PROCESSING = 'processing';
    const CANCELED = 'canceled';
    const COMPLETED = 'completed';
}
