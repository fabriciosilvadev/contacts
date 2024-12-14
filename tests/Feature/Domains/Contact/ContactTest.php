<?php

namespace Tests\Feature\Domains\Contact;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ContactTest extends TestCase
{
    /** @test */
    public function it_creates_a_new_contact()
    {
        Http::fake();

        $user = User::factory()->create([
            'email' => fake()->email,
            'password' => fake()->password,
        ]);

        $contact = Contact::factory()->create([]);

        $this->actingAs($user);

        $this->assertAuthenticatedAs($user);

        $response = $this->post(route('contacts.store'), $contact->toArray());

        $response->assertStatus(302);
        $response->assertRedirect(route('home'));
        $this->assertDatabaseHas('contacts', $contact->toArray());
    }

    /** @test */
    public function it_displays_the_contact_show_page()
    {
        $user = User::factory()->create([
            'email' => fake()->email,
            'password' => fake()->password,
        ]);

        $this->actingAs($user);

        $this->assertAuthenticatedAs($user);

        $contact = Contact::factory()->create();

        $response = $this->get(route('contacts.show', $contact->id));

        $response->assertStatus(200);
        $response->assertViewIs('contacts.show');
        $response->assertViewHas('contact');
    }

    /** @test */
    public function it_displays_the_contact_edit_page()
    {
        $user = User::factory()->create([
            'email' => fake()->email,
            'password' => fake()->password,
        ]);

        $this->actingAs($user);

        $this->assertAuthenticatedAs($user);

        $contact = Contact::factory()->create();

        $response = $this->get(route('contacts.edit', $contact->id));

        $response->assertStatus(200);
        $response->assertViewIs('contacts.edit');
        $response->assertViewHas('contact');
    }

    /** @test */
    public function it_updates_a_contact()
    {
        $user = User::factory()->create([
            'email' => fake()->email,
            'password' => fake()->password,
        ]);

        $this->actingAs($user);

        $this->assertAuthenticatedAs($user);

        $contact = Contact::factory()->create();

        $data = [
            'name' => fake()->name,
            'contact' => "234678907",
            'email' => fake()->email,
        ];

        $response = $this->put(route('contacts.update', $contact->id), $data);

        $response->assertRedirect(route('home'));
    }

    /** @test */
    public function it_deletes_a_contact()
    {
        $user = User::factory()->create([
            'email' => fake()->email,
            'password' => fake()->password,
        ]);

        $this->actingAs($user);

        $this->assertAuthenticatedAs($user);

        $contact = Contact::factory()->create();

        $response = $this->delete(route('contacts.destroy', $contact->id));

        $response->assertRedirect(route('contacts.index'));
        $response->assertSessionHas('success', 'Contact deleted successfully!');
        $this->assertDatabaseMissing('contacts', ['id' => $contact->id]);
    }

    /** @test */
    public function it_shows_error_when_deleting_a_contact_fails()
    {
        $user = User::factory()->create([
            'email' => fake()->email,
            'password' => fake()->password,
        ]);

        $this->actingAs($user);

        $this->assertAuthenticatedAs($user);

        $contact = Contact::factory()->create();

        \Mockery::mock(Contact::class)->shouldReceive('find')->andReturnNull();

        $response = $this->delete(route('contacts.destroy', $contact->id));

        $response->assertRedirect(route('contacts.index'));
        $response->assertStatus(302);
    }
}
