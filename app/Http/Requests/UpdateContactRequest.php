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
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'contact' => [ 'string', 'digits:9', Rule::unique('contacts', 'contact')->ignore($this->route('id'))],
            'email' => [ 'string', 'email', Rule::unique('contacts', 'email')->ignore($this->route('id'))],
        ];
    }
}
