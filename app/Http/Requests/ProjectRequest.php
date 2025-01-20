<?php

namespace App\Http\Requests;

use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'status' => ['required', Rule::in(StatusEnum::all())],
            'contact_id' => ['required', Rule::exists('contacts', 'id')],
        ];
    }
}
