<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
        ]);

        \App\Models\User::factory(1)->create();

        $admin = \App\Models\User::factory()->create([
            'name'     => 'admin',
            'email'    => 'admin@mail.com',
            'password' => 'admin',
        ]);

        $admin->assignRole('admin');
        $admin->givePermissionTo('edit articles');
    }
}
