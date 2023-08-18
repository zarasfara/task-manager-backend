<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\Interfaces\RoleInterface;
use App\Services\RoleService;
use Illuminate\Support\ServiceProvider;

class BindServiceProvider extends ServiceProvider
{
    /**
     * All of the container singletons that should be registered.
     *
     * @var array
     */
    public $singletons = [
        RoleInterface::class => RoleService::class,
    ];
}
