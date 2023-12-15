<?php

namespace App\Contracts;

use Closure;

interface SmsProviderInterface
{
    public function handle(string $phoneNumber, Closure $next): void;

    public function send(string $phoneNumber): bool;
}
