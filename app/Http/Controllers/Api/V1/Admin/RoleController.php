<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GiveRoleRequest;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use App\Services\Interfaces\RoleInterface;

class RoleController extends Controller
{
    public function __construct(private RoleInterface $role){}

    public function giveRole(User $user, GiveRoleRequest $request): JsonResponse
    {
        $request->validated();

        $this->role->giveRole($user, $request->role);

        return response()->json(['message' => 'Роль выдана']);
    }
}
