<?php

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

if (!function_exists('json_response')) {
    function json_response(
        array $data = [],
        int   $status = Response::HTTP_OK
    ): JsonResponse
    {
        $response = [
            'version' => env("APP_VERSION"),
            'code' => $status,
            'content' => $data,
        ];
        return response()
            ->json($response, $status);
    }
}
