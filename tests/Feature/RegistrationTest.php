<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Fortify\Features;
use Laravel\Jetstream\Jetstream;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_registration_screen_can_be_rendered(): void
    {
        if (!Features::enabled(Features::registration())) {
            $this->markTestSkipped('Registration support is not enabled.');
        }

        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    // public function test_registration_screen_cannot_be_rendered_if_support_is_disabled(): void
    // {
    //     if (Features::enabled(Features::registration())) {
    //         $this->markTestSkipped('Registration support is enabled.');
    //     }

    //     $response = $this->get('/register');

    //     $response->assertStatus(404);
    // }

    public function test_new_user_can_register()
    {
        $userData = [
            'name' => $this->faker->name,
            'no_wa' => $this->faker->phoneNumber,
            'alamat' => $this->faker->address,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password',
            'password_confirmation' => 'password',
            'terms' => true,
        ];

        $response = $this->post('/register', $userData);

        $response->assertStatus(302);
        $this->assertDatabaseHas('users', [
            'name' => $userData['name'],
            'email' => $userData['email'],
        ]);
        $this->assertDatabaseHas('detailpelanggan', [
            'no_wa' => $userData['no_wa'],
            'alamat' => $userData['alamat'],
        ]);
    }
}
