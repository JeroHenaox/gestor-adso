<?php

namespace Tests\Feature;

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

    public function test_the_aprendices_page_loads_successfully(): void
    {
        $response = $this->get('/aprendices');

        $response->assertStatus(200);
    }
}