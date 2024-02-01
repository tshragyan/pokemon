<?php

namespace Database\Seeders;

use App\Enums\PokemonFormsEnum;
use App\Models\PokemonForm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PokemonFormSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pokemonForm = new PokemonForm();
        $pokemonForm->title = PokemonFormsEnum::HEAD;
        $pokemonForm->save();

        $pokemonForm = new PokemonForm();
        $pokemonForm->title = PokemonFormsEnum::HEAD_LEGS;
        $pokemonForm->save();

        $pokemonForm = new PokemonForm();
        $pokemonForm->title = PokemonFormsEnum::FINS;
        $pokemonForm->save();

        $pokemonForm = new PokemonForm();
        $pokemonForm->title = PokemonFormsEnum::WINGS;
        $pokemonForm->save();
    }
}
