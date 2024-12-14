<?php

declare(strict_types=1);

namespace App\Domains\Contact\Queries;

use App\Models\Contact;
use Illuminate\Pagination\LengthAwarePaginator;

class PaginationQuery
{
    public function __construct(
        private Contact $contact,
    ) {
    }

    public function handle(): LengthAwarePaginator
    {
        $perPage = 2;

        return $this->contact
            ->query()
            ->paginate($perPage);
    }
}
