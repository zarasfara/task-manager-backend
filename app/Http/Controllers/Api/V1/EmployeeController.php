<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Actions\StoreAvatarAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEmployeeRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as symfonyResponse;

final class EmployeeController extends Controller
{
    /**
     * @throws \Exception
     */
    public function create(CreateEmployeeRequest $request, StoreAvatarAction $storeAvatarAction): JsonResponse
    {
        $data = $request->validated();

        $data['avatar'] = $storeAvatarAction($request->file('avatar'));

        $user = User::create($data);

        return Response::json([
            'user' => $user,
        ], symfonyResponse::HTTP_CREATED);
    }
}
