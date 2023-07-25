<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * handle log in
     *
     * @param LoginRequest $request
     *
     * @return void
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            return response()->json(['errors' => 'Такой учётной записи не существует'], Response::HTTP_UNAUTHORIZED);
        }

        /**
         * @var \App\Models\User
         */
        $user = Auth::user();
        $accessToken = $user->createToken('access_token')->plainTextToken;

        return response()->json([
            'user'         => new UserResource($user),
            'access_token' => $accessToken,
        ], Response::HTTP_OK);
    }

    /**
     * handle logout
     *
     * @param Request $request
     *
     * @return void
     */
    public function logout(Request $request): JsonResponse
    {
        $user = $request->user();

        $user->tokens()->delete();

        return response()->json(['message' => 'Logged out successfully'], Response::HTTP_OK);
    }
}
