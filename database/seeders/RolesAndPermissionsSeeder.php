<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('cache:forget spatie.permission.cache');

        // create permissions
        $permissions = [
            'edit articles',
            'give rights',
            'give permissions',
        ];

        $now = Carbon::now();
        $permissionModels = collect($permissions)->map(function ($permission) use ($now) {
            return [
                'name' => $permission,
                'guard_name' => 'web',
                'created_at' => $now,
                'updated_at' => $now,
            ];
        });

        Permission::query()->insert($permissionModels->toArray());

        // create roles
        $admin = Role::create(['name' => 'admin']);
        $programmer = Role::create(['name' => 'programmer']);
        $manager = Role::create(['name' => 'manager']);

        $admin->syncPermissions(Permission::all());
    }
}
