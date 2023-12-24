<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Admin;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\GiveRoleRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

final class RoleController extends Controller
{
    public function giveRole(GiveRoleRequest $request): JsonResponse
    {
        $request->validated();

        /**
         * @var App\Models\User $user
         */
        $user = Auth::user();

        $user->assignRole(Role::from($request->role)->value);

        return response()->json(['message' => __('messages.roles.granted')]);
    }
}
