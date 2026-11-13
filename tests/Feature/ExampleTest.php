<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_redirects_to_aprendices(): void
    {
        $response = $this->get('/');

        $response->assertRedirect('/aprendices');
    }

    public function test_guests_cannot_access_aprendices(): void
    {
        $response = $this->get('/aprendices');

        $response->assertRedirect('/login');
    }

    public function test_authenticated_users_can_access_aprendices(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/aprendices');

        $response->assertStatus(200);
    }
}
