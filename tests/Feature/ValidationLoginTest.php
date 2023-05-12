<?php

namespace Tests\Feature;

use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class ValidationLoginTest extends TestCase
{
    public function test_incorrect_email()
    {
        $this->get(route('login'));
        $response = $this->followingRedirects()
            ->post(route('login'), ['email' => 'oev2001@', 'password' => 'test123']);

        $response->assertInertia(fn(AssertableInertia $page) => $page
        ->component('Login')
        ->where('errors.email' , 'Почта некорректная'));

    }

    public function test_password_is_too_short()
    {
        $this->get(route('login'));

        $response = $this->followingRedirects()
            ->post(route('login'), ['email' => 'test@email.com', 'password' => 'te']);

        $response->assertInertia(fn(AssertableInertia $page) => $page
            ->component('Login')
            ->where('errors.password', 'Пароль должен быть минимум 6 символов')
        );
    }
}
