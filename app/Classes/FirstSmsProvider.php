<?php

namespace App\Classes;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FirstSmsProvider extends SmsProviderAbstract
{
    public string $url = 'https://google.com/';

    public function send(string $phoneNumber): bool
    {
        $response = Http::get($this->url);

        if ($response->ok())
            Log::channel('sms')
                ->info("Thank you {$phoneNumber} from first");

        return false;
    }
}
