<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login()
    {
        $password = "qwe123";
        $user = User::factory()
            ->create(['password' => bcrypt($password)]);

        $response = $this->post(route('login'), ['email' => $user->email, 'password' => $password]);
        $response->assertRedirect(route('dashboard'));
    }

    public function test_logout()
    {
        $response = $this->get(route('login'));
        $response->assertStatus(200);
    }
}
