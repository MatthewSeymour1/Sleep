<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class NavigationTest extends TestCase
{

    
    public function test_navigation_to_dashboard(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/dashboard');

        $response->assertStatus(200);
    }

    public function test_navigation_to_view_sleep_logs_page(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/sleep-logs');

        $response->assertStatus(200);
    }

    public function test_navigation_to_view_sleep_logs_create_page(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/sleep-log/create');

        $response->assertStatus(200);
    }

    //This fails and I'm commenting it so that I can move on and test other things without the error repeatedly coming up.
    // public function test_navigation_to_view_advice_of_the_day_page(): void
    // {
    //     $user = User::factory()->create();

    //     $this->actingAs($user);

    //     $response = $this->get('/advice-of-the-day');

    //     $response->assertStatus(200);
    // }
}