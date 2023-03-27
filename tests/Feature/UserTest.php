<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use App\Models\User;

class UserTest extends TestCase
{
    //use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    /* public function test_the_application_returns_a_successful_response(): void
    {
        $this->withExceptionHandling();

        Sanctum::actingAs(
            User::factory()->create([
                'name'=>'maria',
                'parent'=>'maria',
                'email'=>'maria@gmail.com',
                'password'=>'password',
            ])
        );

        $response = $this->get('/');

        $response->assertStatus(200);
    } */
}
