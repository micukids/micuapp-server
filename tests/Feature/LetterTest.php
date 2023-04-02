<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Letter;
use App\Models\User;

class LetterTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_store_a_letter()
    {
        $this->withExceptionHandling();

        $admin = User::factory()->create(['role_as' => 1]);

        $this->actingAs($admin);
        $this->post(route('letterStore'), [
            'letter' => 'b',
            'type' => 'consonant',
            'sound' => 'b.mp3',
            'image' => 'b.jpg',
            'video' => 'b.mp4'
        ]);

        $this->assertDatabaseCount('letters', 1)
        ->assertDatabaseHas('letters',[
            'letter' => 'b',
            'type' => 'consonant',
            'sound' => 'b.mp3',
            'image' => 'b.jpg',
            'video' => 'b.mp4'
        ]);
    }

    public function test_admin_can_see_edit_letter_page()
    {
        $this->withExceptionHandling();

        $admin = User::factory()->create(['role_as' => 1]);
        $letter = Letter::factory()->create();

        $response = $this->actingAs($admin)->get(route('letterShow', [
            'id' => $letter->id
        ]));
        $response->assertStatus(200);
        $response->assertSee($letter->letter);
    }

    public function test_admin_can_update_a_letter()
    {
        $this->withExceptionHandling();

        $admin = User::factory()->create(['role_as' => 1]);
        $letter = Letter::factory()->create();
        $this->assertCount(1, Letter::all());

        $letter = Letter::first();
        $response = $this->actingAs($admin)->put(route('letterUpdate', [
            'id' => $letter->id,
            'letter' => 'ch',
            'type' => 'consonant',
            'sound' => 'ch.mp3',
            'image' => 'ch.jpg',
            'video' => 'ch.mp4'
        ]));
        $response->assertSessionHasNoErrors();
        $this->assertEquals('ch', Letter::first()->letter);
        $this->assertEquals('consonant', Letter::first()->type);
        $this->assertEquals('ch.mp3', Letter::first()->sound);
        $this->assertEquals('ch.jpg', Letter::first()->image);
        $this->assertEquals('ch.mp4', Letter::first()->video);
    }

    public function test_admin_can_delete_letter()
    {
        $admin = User::factory()->create(['role_as' => 1]);
        $letter = Letter::factory()->create();

        $this->assertEquals(1, Letter::count());
        
        $response = $this->actingAs($admin)->delete(route('letterDestroy', [
            'id' => $letter->id
        ]));
        
        $this->assertEquals(0, Letter::count());
    }

    public function test_user_can_see_vowels(){

        $this->withExceptionHandling();

        $vowels = Letter::showvowels();
        //var_dump($vowels);
        //dd();
        //$this->assertCount(5, $vowels);
        //$this->withExceptionHandling();

        //$response = $this->get('http://localhost:3000');
        $response = $this->$vowels = Letter::showvowels();

        //$response->assertJsonIsArray($vowels);
        $response-> $this->assertCount(5, $vowels);
      }

}
