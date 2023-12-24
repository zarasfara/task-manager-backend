<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();

        $admin = User::where(['name' => 'admin'])->first();

        $response = $this->postJson(route('api.v1.login'), ['email' => $admin->email, 'password' => 'admin']);
        $this->withHeaders(['Authorization' => 'Bearer '.$response['access_token']]);

        $this->user = User::factory()->create();
    }

    public function test_user_with_permission_can_give_role(): void
    {
        $response = $this->postJson(route('api.v1.role.give', $this->user->nickname), ['role' => Role::Admin->value]);
        $response->assertStatus(200)->assertJson(['message' => __('messages.roles.granted')]);

        $this->assertTrue($this->user->hasRole(Role::Admin->value));
    }

    public function test_validation_fails_for_missing_role(): void
    {
        $response = $this->postJson(route('api.v1.role.give', $this->user->nickname), []);

        $response->assertStatus(422)->assertJsonValidationErrors(['role']);
    }

    public function test_validation_fails_for_invalid_role(): void
    {
        $response = $this->postJson(route('api.v1.role.give', $this->user->nickname), ['role' => 'InvalidRole']);

        $response->assertStatus(422)->assertJsonValidationErrors(['role']);
    }
}
