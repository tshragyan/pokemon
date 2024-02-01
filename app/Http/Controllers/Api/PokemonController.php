<?php

namespace App\Http\Controllers\Api;

use App\Facades\AbilityFacade;
use App\Facades\LocationFacade;
use App\Facades\PokemonFacade;
use App\Facades\PokemonFormFacade;
use App\Http\Requests\PokemonCreateRequest;
use App\Http\Resources\PokemonResource;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pokemon = PokemonFacade::getList($request->all());
        return PokemonResource::collection($pokemon);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PokemonCreateRequest $request)
    {
        if ($request->validated('ability_id')) {
            $ability = AbilityFacade::findById($request->validated('ability_id'));
        } else {
            $ability = AbilityFacade::create($request->validated('ability'));
        }

        if ($request->validated('location_id')) {
            $location = LocationFacade::findById($request->validated('location_id'));
        } else {
            $location = LocationFacade::create($request->validated('location'));
        }

        if ($request->validated('form_id')) {
            $form = PokemonFormFacade::findById($request->validated('form_id'));
        } else {
            $form = PokemonFormFacade::findByTitle($request->validated('form'));
        }

        $pokemon = PokemonFacade::create([
            'name' => $request->validated('name'),
            'image' => $request->validated('image'),
            'form_id' => $form->id,
            'ability_id' => $ability->id,
            'location_id' => $location->id
        ]);

        return new PokemonResource($pokemon);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        return new PokemonResource($pokemon);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PokemonCreateRequest $request, Pokemon $pokemon)
    {
        $pokemon = PokemonFacade::update($request->validated(), $pokemon);
        return new PokemonResource($pokemon);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        PokemonFacade::delete($pokemon);
    }
}
