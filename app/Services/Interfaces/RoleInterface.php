<?php

declare(strict_types=1);

namespace App\Services\Interfaces;

use App\Models\User;

interface RoleInterface
{
    public function giveRole(User $user, string $role): void;
}
