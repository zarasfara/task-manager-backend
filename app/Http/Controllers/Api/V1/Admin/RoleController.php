<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GiveRoleRequest;
use App\Models\User;
use App\Services\Interfaces\RoleInterface;
use Illuminate\Http\JsonResponse;

class RoleController extends Controller
{
    public function __construct(private RoleInterface $role)
    {
    }

    public function giveRole(User $user, GiveRoleRequest $request): JsonResponse
    {
        $request->validated();

        $this->role->giveRole($user, $request->role);

        return response()->json(['message' => __('messages.roles.granted')]);
    }
}
