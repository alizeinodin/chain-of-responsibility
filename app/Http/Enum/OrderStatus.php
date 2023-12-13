<?php

namespace App\Http\Enum;

enum OrderStatus: string
{
    const PENDING = 'pending';
    const AWAITING_PAYMENT = 'awaiting payment';
    const PROCESSING = 'processing';
    const CANCELED = 'canceled';
    const COMPLETED = 'completed';
}
