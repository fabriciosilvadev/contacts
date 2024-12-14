<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'contact' => ['required', 'string', 'digits:9', 'unique:contacts,contact'],
            'email' => ['required', 'string', 'email', 'unique:contacts,email'],
        ];
    }
}
