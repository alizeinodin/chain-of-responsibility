<?php

namespace App\Classes;

use App\Contracts\SmsProviderInterface;
use Closure;

abstract class SmsProviderAbstract implements SmsProviderInterface
{
    public string $url;

    public static array $providers = [
        FirstSmsProvider::class,
        SecondSmsProvider::class,
        ThirdSmsProvider::class,
    ];

    public function handle(string $phoneNumber, Closure $next): void
    {
        if (!$this->send($phoneNumber))
            $next($phoneNumber);
    }

    abstract public function send(string $phoneNumber): bool;
}
