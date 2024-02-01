<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PokemonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'form' => $this->form->title,
            'ability_ru' => $this->ability->title_ru,
            'ability_en' => $this->ability->title_en,
            'ability_image' => $this->ability->image,
            'country' => $this->location->country,
            'city' => $this->location->city,
            'street' => $this->location->street,
        ];
    }
}
