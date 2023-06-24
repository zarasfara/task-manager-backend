<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin'),
        ]);

        var_dump($admin->createToken('admin-token')->plainTextToken);

        \App\Models\User::factory()->create([
            'name' => 'test',
            'email' => 'test@email.com',
            'password' => Hash::make('test123'),
        ]);

    }
}
