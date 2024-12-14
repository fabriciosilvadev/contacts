<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\ContactFactory;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    protected $model = Contact::class;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::factory()->count(10)->create();
    }
}
