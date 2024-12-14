<?php

declare(strict_types=1);

namespace App\Domains\Contact\Actions;

use App\Domains\Contact\Data\CreateContactData;
use App\Models\Contact;

class CreateContactAction
{
    public function __construct(
        private Contact $contact
    ) {
    }

    public function handle($data): Contact
    {
        /** @var Contact $contact */
        $contact = $this->contact->query()->create($data);

        return $contact;
    }
}
