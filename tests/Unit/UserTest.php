<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_duplication()
    {
        $user1 = User::make([
            'name' => 'Thiago',
            'parent' => 'Julio',
            'email' => 'julio@gmail.com',
            'password' => 'password01'
        ]);

        $user2 = User::make([
            'name' => 'Thiago',
            'parent' => 'Julio',
            'email' => 'juliomerino@gmail.com',
            'password' => 'password01'
        ]);

        $this->assertTrue($user1->email != $user2->email);
    }

    public function test_user_creation()
    {
        $this->withoutExceptionHandling();

        $response = $this->post(route('signUp'),
            [
                'name' => 'Thiago',
                'parent' => 'Julio',
                'email' => 'juliomerino@gmail.com',
                'password' => 'password01',
                
            ]);

        $response
            ->assertStatus(200);
            $this->assertCount(1, User::all());
    }
}
