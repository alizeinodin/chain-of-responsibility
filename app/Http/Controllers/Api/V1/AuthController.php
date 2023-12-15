<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    /**
     * @param RegisterRequest $request
     *
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        $user = User::create([
            'name' => $validatedData['firstname'] . ' ' . $validatedData['lastname'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        $token = $user->createToken('access_token')->accessToken;

        $response = [
            'user' => $user,
            'accessToken' => $token,
            'message' => $user->firstname . ' ' . __('welcome', 'Welcome to app'),
        ];

        return response()->json($response, Response::HTTP_CREATED);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        if (Auth::attempt([
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ])) {

            $response = [
                'user' => Auth::user(),
                'access_token' => Auth::user()->createToken('access_token')->plainTextToken,
                'token_type' => 'Bearer',
            ];

            return response()
                ->json($response, Response::HTTP_OK);
        }

        return response()
            ->json([
                'message' => 'The provided credentials are incorrect.',
            ], Response::HTTP_FORBIDDEN);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        $response = [
            'message' => 'You have successfully logged out!',
        ];

        return response()
            ->json($response, Response::HTTP_NO_CONTENT);
    }
}
