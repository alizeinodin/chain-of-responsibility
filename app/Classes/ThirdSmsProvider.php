<?php

namespace App\Classes;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ThirdSmsProvider extends SmsProviderAbstract
{
    public string $url = 'https://yahoo.com/';

    public function send(string $phoneNumber): bool
    {
        $response = Http::get($this->url);

        if ($response->ok())
            Log::channel('sms')
                ->info("Thank you {$phoneNumber} from third");

        return $response->ok();
    }
}
