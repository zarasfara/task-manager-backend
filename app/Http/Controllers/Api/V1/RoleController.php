<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\GiveRoleRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

final class RoleController extends Controller
{
    public function giveRole(GiveRoleRequest $request, User $user): JsonResponse
    {
        $request->validated();

        $user->assignRole(Role::from($request->role)->value);

        return response()->json(['message' => __('messages.roles.granted')]);
    }
}
