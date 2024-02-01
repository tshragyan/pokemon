<?php

namespace App\Services;

use App\Models\PokemonForm;
use Illuminate\Database\Eloquent\Collection;

class PokemonFormService
{
    public function findByTitle(array $data): PokemonForm
    {
        return PokemonForm::where('title', $data['title'])->first();
    }

    public function findById(int $id): PokemonForm
    {
        return PokemonForm::find($id);
    }

    public function getList(): Collection
    {
        return PokemonForm::all();
    }


}
