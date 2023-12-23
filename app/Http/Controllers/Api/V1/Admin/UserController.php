<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as symfonyResponse;

final class UserController extends Controller
{
    public function create(Request $request): JsonResponse
    {
        return Response::json([
            'user' => 'user',
        ], symfonyResponse::HTTP_CREATED);
    }
}
