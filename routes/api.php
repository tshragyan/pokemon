<?php

use App\Http\Controllers\Api\AbilityController;
use App\Http\Controllers\Api\PokemonController;
use App\Http\Controllers\Api\PokemonFormController;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('pokemon', PokemonController::class)->middleware('api');
Route::apiResource('ability', AbilityController::class)->middleware('api');
Route::apiResource('location', Location::class)->middleware('api');
Route::apiResource('pokemon-form', PokemonFormController::class)->middleware('api');
