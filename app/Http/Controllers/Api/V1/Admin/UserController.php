<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function create(Request $request): JsonResponse
    {
        return response()->json([
            'user' => 'user',
        ], Response::HTTP_CREATED);
    }
}
