<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbilityCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ability.title_ru' => 'required|string|regex:/^[\p{Cyrillic}0-9]+$/u|max:255',
            'ability.title_en' => 'required|string|regex:/^[a-zA-Z0-9]+$/u|max:255',
            'ability.image' => 'required|image|mimes:jpeg,png,jpg|max:2480',
        ];
    }
}
