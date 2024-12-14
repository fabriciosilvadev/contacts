<?php

declare(strict_types=1);

namespace App\Domains\Contact\Actions;

use App\Domains\Contact\Data\UpdateContactData;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UpdateContactAction
{
    public function __construct(
        private Contact $contact
    ) {
    }

    public function handle(UpdateContactData $data): Builder|array|Collection|Model
    {

        $contact = $this->contact->query()->findOrFail($data->id);
        $contact->update($data->toArray());

        return $contact;
    }
}
