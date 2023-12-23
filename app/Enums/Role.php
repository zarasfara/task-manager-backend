<?php

declare(strict_types=1);

namespace App\Enums;

enum Role: string
{
    case Admin = 'admin';
    case Programmer = 'programmer';
    case Manager = 'manager';

    public function getRoleName(): string
    {
        return match ($this) {
            self::Admin => 'Администратор',
            self::Programmer => 'Программист',
            self::Manager => 'Менеджер',
        };
    }
}
