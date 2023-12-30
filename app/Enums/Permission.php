<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * Acceptable naming for enums.
 *
 * Examples:
 * - create user - CreateUser
 * - read task - ReadTask
 * - delete comment - DeleteComment
 * - assign permission - AssignPermission
 * - update role - UpdateRole
 */
enum Permission: string
{
    /**
     * Возможность создать нового сотрудника.
     */
    case CreateEmployee = 'create employee';

    /**
     * Возможность назначить разрешение.
     */
    case AssignPermission = 'assign permission';

    public function label(): string
    {
        return match ($this) {
            self::CreateEmployee => 'Добавить сотрудника',
            self::AssignPermission => 'Назначать разрешение',
        };
    }
}
