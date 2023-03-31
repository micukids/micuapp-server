<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Download;
use App\Models\User;

class DownloadTest extends TestCase
{
    use RefreshDatabase;
    public function test_admin_can_store_a_download()
    {
        $this->withExceptionHandling();

        $admin = User::factory()->create(['role_as' => 1]);

        $this->actingAs($admin);
        $this->post(route('downloadStore'), [
            'thumb' => 'potpetit.jpg',
            'url' => 'http://potpetit.cat',
            'description' => 'avui veurem al pot pettit.'
        ]);

        $this->assertDatabaseCount('downloads', 1)
        ->assertDatabaseHas('downloads',[
            'thumb' => 'potpetit.jpg',
            'url' => 'http://potpetit.cat',
            'description' => 'avui veurem al pot pettit.'
        ]);
    }

    public function test_admin_can_see_edit_download_page()
    {
        $this->withExceptionHandling();

        $admin = User::factory()->create(['role_as' => 1]);
        $download = Download::factory()->create();

        $response = $this->actingAs($admin)->get(route('downloadShow', [
            'id' => $download->id
        ]));
        $response->assertStatus(200);
        $response->assertSee($download->description);
    }

    public function test_admin_can_update_a_download()
    {
        $this->withExceptionHandling();

        $admin = User::factory()->create(['role_as' => 1]);
        $download = Download::factory()->create();
        $this->assertCount(1, Download::all());

        $download = Download::first();
        $response = $this->actingAs($admin)->put(route('downloadUpdate', [
            'id' => $download->id,
            'thumb' => 'mainasons.png',
            'url' => 'http://mainasons.cat',
            'description' => 'Avui veurem els mainasons.'
        ]));
        $response->assertSessionHasNoErrors();
        $this->assertEquals('mainasons.png', Download::first()->thumb);
        $this->assertEquals('http://mainasons.cat', Download::first()->url);
        $this->assertEquals('Avui veurem els mainasons.', Download::first()->description);
    }

    public function test_admin_can_delete_a_download()
    {
        $admin = User::factory()->create(['role_as' => 1]);
        $download = Download::factory()->create();

        $this->assertEquals(1, Download::count());
        
        $response = $this->actingAs($admin)->delete(route('downloadDestroy', [
            'id' => $download->id
        ]));
        
        $this->assertEquals(0, Download::count());
    }

}
