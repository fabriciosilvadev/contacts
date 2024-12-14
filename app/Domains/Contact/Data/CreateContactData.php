<?php

declare(strict_types=1);

namespace App\Domains\Contact\Data;

use Spatie\LaravelData\Data;

class CreateContactData extends Data
{
    public string $name;

    public string $contact;

    public string $email;
}
