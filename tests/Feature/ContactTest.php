<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Contact;
use App\Models\User;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_message_can_be_store()
    {
        $this->withExceptionHandling();

        $contacts = Contact::factory()->create([
            'name' => 'Laura R.',
            'email' => 'consonant@edu.es',
            'subject' => 'felicitaciones',
            'message' => 'Ha sido genial vuestra presesntación.'
        ]);

        $this->assertDatabaseCount('contacts', 1);

    }

    public function test_admin_can_delete_contact_message()
    {
        $admin = User::factory()->create(['role_as' => 1]);
        $contact = Contact::factory()->create();

        $this->assertEquals(1, Contact::count());
        
        $response = $this->actingAs($admin)->delete(route('contactDestroy', [
            'id' => $contact->id
        ]));
        
        $this->assertEquals(0, Contact::count());

    }
}
