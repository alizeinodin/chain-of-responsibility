<?php

namespace App\Http\Enum;

enum OrderStatus: string
{
    case PENDING = 'pending';
    case AWAITING_PAYMENT = 'awaiting payment';
    case PROCESSING = 'processing';
    case CANCELED = 'canceled';
    case COMPLETED = 'completed';
}
