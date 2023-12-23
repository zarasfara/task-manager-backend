<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as symfonyResponse;

final class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        if (! Auth::attempt($credentials)) {
            return Response::json(['errors' => __('auth.errors.failed')], symfonyResponse::HTTP_UNAUTHORIZED);
        }

        /**
         * @var \App\Models\User $user
         */
        $user = Auth::user();
        $accessToken = $user->createToken('access_token')->plainTextToken;

        return Response::json([
            'user' => new UserResource($user),
            'access_token' => $accessToken,
        ], symfonyResponse::HTTP_OK);
    }

    public function user(): JsonResponse
    {
        return Response::json([
            'user' => new UserResource(Auth::user()),
        ]);
    }

    public function logout(): JsonResponse
    {
        /**
         * @var \App\Models\User $user
         */
        $user = Auth::user();

        $user->tokens()->delete();

        return Response::json(['message' => __('auth.logout_success')], symfonyResponse::HTTP_OK);
    }
}
