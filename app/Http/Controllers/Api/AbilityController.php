<?php

namespace App\Http\Controllers\Api;

use App\Facades\AbilityFacade;
use App\Http\Requests\AbilityCreateRequest;
use App\Http\Resources\AbilityResource;
use App\Models\Ability;
use Illuminate\Http\Request;

class AbilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abilities = AbilityFacade::getList();
        return AbilityResource::collection($abilities);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ability = AbilityFacade::create($request->vaildated());
        return new AbilityResource($ability);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ability $ability)
    {
        return new AbilityResource($ability);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AbilityCreateRequest $request, Ability $ability)
    {
        $ability = AbilityFacade::update($request->validated(), $ability);
        return new AbilityResource($ability);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ability $ability)
    {
        AbilityFacade::delete($ability);
        return true;
    }
}
