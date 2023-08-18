<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\UserRole;
use App\Models\User;
use App\Services\Interfaces\RoleInterface;

class RoleService implements RoleInterface
{
    public function giveRole(User $user, string $role): void
    {
        $user->assignRole(UserRole::from($role)->value);
    }
}
