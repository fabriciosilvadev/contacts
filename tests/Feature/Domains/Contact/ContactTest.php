<?php
namespace Tests\Feature\Domains\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ContactTest extends TestCase
{

    /** @test */
    public function it_creates_a_new_contact()
    {
        $user = User::factory()->create([
            'email' => fake()->email,
            'password' => fake()->password,
        ]);

        $data = [
            'name' => fake()->name,
            'contact' => fake()->randomNumber(9),
            'email' => fake()->email(),
        ];

        $this->actingAs($user);

        $this->assertAuthenticatedAs($user);

       // dd(auth()->user());

        $response = $this->post(route('contacts.store'), $data);

        $response->assertStatus(302);
        //$response->assertRedirect(route('contacts.index'));
        //$response->assertSessionHas('success', 'Contact created with successfully!');
        //$this->assertDatabaseHas('contacts', $data);
    }
}
