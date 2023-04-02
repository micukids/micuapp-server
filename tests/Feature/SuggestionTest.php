<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Suggestion;
use App\Models\User;

class SuggestionTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_see_suggestions_page()
    {
        $this->withExceptionHandling();

        $user = User::factory()->create();
        $suggestion = Suggestion::factory()->create();
        
        $this->assertEquals(1, Suggestion::count());

        $response = $this->actingAs($user)->get(route('suggestions', [
            'id' => $suggestion->id
        ]));

        $response->assertStatus(200)
        ->assertSee($suggestion->title)
        ->assertSee($suggestion->description);
    }

    public function test_admin_can_store_a_suggestion()
    {
        $this->withExceptionHandling();

        $admin = User::factory()->create(['role_as' => 1]);

        $this->actingAs($admin);
        $this->post(route('suggestionStore'), [
            'title' => 'pot petit',
            'image' => 'potpetit.jpg',
            'url' => 'http://potpetit.cat',
            'description' => 'avui veurem al pot pettit.'
        ]);

        $this->assertDatabaseCount('suggestions', 1)
        ->assertDatabaseHas('suggestions',[
            'title' => 'pot petit',
            'image' => 'potpetit.jpg',
            'url' => 'http://potpetit.cat',
            'description' => 'avui veurem al pot pettit.'
        ]);
    }

    public function test_admin_can_see_edit_suggestion_page()
    {
        $this->withExceptionHandling();

        $admin = User::factory()->create(['role_as' => 1]);
        $suggestion = Suggestion::factory()->create();

        $response = $this->actingAs($admin)->get(route('suggestionShow', [
            'id' => $suggestion->id
        ]));
        $response->assertStatus(200);
        $response->assertSee($suggestion->title);
    }

    public function test_admin_can_update_a_suggestion()
    {
        $this->withExceptionHandling();

        $admin = User::factory()->create(['role_as' => 1]);
        $suggestion = Suggestion::factory()->create();
        $this->assertCount(1, Suggestion::all());

        $suggestion = Suggestion::first();
        $response = $this->actingAs($admin)->put(route('suggestionUpdate', [
            'id' => $suggestion->id,
            'title' => 'Mainasons',
            'image' => 'mainasons.jpg',
            'url' => 'http://mainasons.cat',
            'description' => 'Avui veurem els mainasons.'
        ]));
        $response->assertSessionHasNoErrors();
        $this->assertEquals('Mainasons', Suggestion::first()->title);
        $this->assertEquals('mainasons.jpg', Suggestion::first()->image);
        $this->assertEquals('http://mainasons.cat', Suggestion::first()->url);
        $this->assertEquals('Avui veurem els mainasons.', Suggestion::first()->description);
    }

    public function test_admin_can_delete_suggestion()
    {
        $admin = User::factory()->create(['role_as' => 1]);
        $suggestion = Suggestion::factory()->create();

        $this->assertEquals(1, Suggestion::count());
        
        $response = $this->actingAs($admin)->delete(route('suggestionDestroy', [
            'id' => $suggestion->id
        ]));
        
        $this->assertEquals(0, Suggestion::count());
    }

}
