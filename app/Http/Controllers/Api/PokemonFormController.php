<?php

namespace App\Http\Controllers\Api;

use App\Facades\PokemonFormFacade;
use App\Http\Resources\PokemonFormResource;
use App\Models\PokemonForm;
use Illuminate\Http\Request;

class PokemonFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokemonForms = PokemonFormFacade::getList();
        return new PokemonFormResource($pokemonForms);
    }

    /**
     * Display the specified resource.
     */
    public function show(PokemonForm $pokemonForm)
    {
        return new PokemonFormResource($pokemonForm);
    }

}
