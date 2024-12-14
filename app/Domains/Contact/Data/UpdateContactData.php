<?php

declare(strict_types=1);

namespace App\Domains\Contact\Data;

use Spatie\LaravelData\Data;

class UpdateContactData extends Data
{
    public ?int $id;

    public string $name;

    public string $contact;

    public string $email;
}
