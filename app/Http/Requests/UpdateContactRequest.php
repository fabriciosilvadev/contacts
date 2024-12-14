<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [ 'string', 'max:255'],
            'contact' => [ 'string', Rule::unique('contacts', 'contact')->ignore($this->route('contact'))],
            'email' => [ 'string', 'email', Rule::unique('contacts', 'email')->ignore($this->route('contact'))],
        ];
    }
}
