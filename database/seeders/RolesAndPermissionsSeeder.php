<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        Permission::create(['name' => 'edit articles']);

        // create roles
        $adminRole = Role::create(['name' => 'admin']);
        $programmerRole = Role::create(['name' => 'programmer']);
        $managerRole = Role::create(['name' => 'manager']);

        // $programmerRole->givePermissionTo('edit articles');

        // Возможно понадобвиться, если не смогу нормально права давать
        // $adminRole->givePermissionTo(Permission::all());
    }
}
