<?php

namespace App\Http\Controllers\Api;

use App\Facades\LocationFacade;
use App\Http\Requests\LocationCreateRequest;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = LocationFacade::getList();
        return LocationResource::collection($locations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationCreateRequest $request)
    {
        $location = LocationFacade::create($request->validated());
        return new LocationResource($location);
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        return new LocationResource($location);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationCreateRequest $request, Location $location)
    {
        $location = LocationFacade::update($request->validated(), $location);
        return new LocationResource($location);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        LocationFacade::delete($location);
        return true;
    }
}
