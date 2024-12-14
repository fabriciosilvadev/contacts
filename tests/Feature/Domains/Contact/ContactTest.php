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
        User::factory()->create([
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
        ]);

        $data = [
            'name' => fake()->name,
            'contact' => fake()->randomNumber(9),
            'email' => fake()->email(),
        ];

        $this->post(route('authentication'), [
            'email' => 'user@example.com',
            'password' => 'password123',
        ]);

        $response = $this->post(route('contacts.store'), $data);

       // $response->assertRedirect(route('contacts.index'));
        //$response->assertSessionHas('success', 'Contact created with successfully!');
        $this->assertDatabaseHas('contacts', $data);
    }
}
