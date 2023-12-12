<?php

namespace App\Http\Enum;

enum TransactionStatus: string
{
    case PENDING = 'pending';
    case REJECTED = 'rejected';
    case ACCEPTED = 'accepted';
}
