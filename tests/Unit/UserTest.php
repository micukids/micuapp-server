<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class UserTest extends TestCase
{
    use WithFaker;
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

        $nameOne =$this->faker->firstNameFemale();
        $parentOne =$this->faker->firstName();
        $emailOne =$this->faker->freeEmail();
        $passwordOne =$this->faker->password();

        $response = $this->json(
            'POST',
            'register',
            [
                'name' =>  $nameOne,
                'parent' => $parentOne,
                'email' => $emailOne,
                'password' => $passwordOne,
            ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'creado'=>true,
            ]);
    }
}
