<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PokemonCreateRequest extends FormRequest
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
        $validationParams = [
            'name' => 'required|string|max:255|unique:pokemons,name',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:20480',
        ];

        if ($this->input('form_id')) {
            $validationParams['form_id'] = 'exists:pokemon_forms,id';
        } else {
            $validationParams['form'] = 'required|array';
            $validationParams['form.title'] = 'required|string|exists:pokemon_forms,title';
        }

        if ($this->input('ability_id')) {
            $validationParams['ability_id'] = 'exists:abilities,id';
        } else {
            $validationParams['ability'] = 'required|array|min:3';
            $validationParams['ability.title_ru'] = 'required|string|regex:/^[\p{Cyrillic}0-9]+$/u|max:255';
            $validationParams['ability.title_en'] = 'required|string|regex:/^[a-zA-Z0-9]+$/u|max:255';
            $validationParams['ability.image'] = 'required|image|mimes:jpeg,png,jpg|max:2480';
        }

        if ($this->input('location_id')) {
            $validationParams['location_id'] = 'exists:locations,id';
        } else {
            $validationParams['location'] = 'required|array|min:3';
            $validationParams['location.country'] = 'required|string|max:255';
            $validationParams['location.city'] = 'required|string|max:255';
            $validationParams['location.street'] = 'required|string|max:255';
        }

        return $validationParams;

    }

    public function messages()
    {
        return [
            'ability.title_ru.regex' => 'must be in russian',
            'ability.title_en.regex' => 'must be in english'
        ];
    }
}
