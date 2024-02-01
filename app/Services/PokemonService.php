<?php

namespace App\Services;

use App\Facades\AbilityFacade;
use App\Facades\LocationFacade;
use App\Facades\PokemonFormFacade;
use App\Models\Location;
use App\Models\Pokemon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class PokemonService
{
    public function create(array $data): Pokemon
    {
        $pokemon = new Pokemon();
        $pokemon->name = $data['name'];
        $pokemon->ability_id = $data['ability_id'];
        $pokemon->location_id = $data['location_id'];
        $pokemon->form_id = $data['form_id'];

        $imageName = time() . '.' . $data['image']->extension();
        $data['image']->move(public_path("images"), $imageName);

        $pokemon->image = public_path("images") . "\\" . $imageName;
        $pokemon->save();

        return $pokemon;
    }

    public function getList(array $data): Collection|array
    {
        $query = Pokemon::query();
        $locationColumns = Schema::getColumnListing((new Location())->getTable());

        if ((isset($data['filter'])) &&
            isset($data['filter']['location']) &&
            count(array_intersect(array_keys($data['filter']['location']), $locationColumns)) == count($data['filter']['location'])
        ) {
            $query->whereHas('location', function($query) use($data) {
                foreach ($data['filter']['location'] as $key => $value) {
                    $query->where($key, $value);
                }
            });
        }

        if ((isset($data['sort'])) &&
            isset($data['sort']['location']) &&
            count(array_intersect(array_keys($data['sort']['location']), $locationColumns)) == count($data['sort']['location'])
        ) {
            $query->with(['location' => function ($query) use ($data) {
                $query->orderBy(array_keys($data['sort']['location'])[0], array_values($data['sort']['location'])[0]);
            }]);
            $query->join('locations', 'pokemons.location_id', '=', 'locations.id')
                ->orderBy('locations.' . array_keys($data['sort']['location'])[0], array_values($data['sort']['location'])[0]);
        }

        return $query->get();
    }

    public function update($data, Pokemon $pokemon): Pokemon
    {
        if ($data['ability_id']) {
            $pokemon->ability_id = $data['ability_id'];
        } else {
            $ability = AbilityFacade::create($data['ability']);
            $pokemon->ability_id = $ability->id;
        }

        if (!$pokemon->ability->pokemon()->count()) {
            $ability = AbilityFacade::findById($pokemon->ability_id);
            AbilityFacade::delete($ability);
        }

        if ($data['location_id']) {
            $pokemon->location_id = $data['location_id'];
        } else {
            $location = LocationFacade::create($data['location']);
            $pokemon->location_id = $location->id;
        }

        if (!$pokemon->location->pokemon()->count()) {
            $location = LocationFacade::findById($pokemon->location_id);
            LocationFacade::delete($location);
        }

        if ($data['form_id']) {
            $pokemon->form_id = $data['form_id'];
        } else {
            $form = PokemonFormFacade::findByTitle($data['form']['title']);
            $pokemon->form_id = $form->id;
        }

        $pokemon->name = $data['name'];
        File::delete($pokemon->image);
        $pokemon->image = imageUploadHelper($data['image'], 'images');
        $pokemon->save();
        return $pokemon;
    }

    public function delete(Pokemon $pokemon): bool
    {
        if (!$pokemon->location->pokemon()->count()) {
            $location = LocationFacade::findById($pokemon->location_id);
            LocationFacade::delete($location);
        }

        if (!$pokemon->ability->pokemon()->count()) {
            $ability = AbilityFacade::findById($pokemon->ability_id);
            AbilityFacade::delete($ability);
        }

        File::delete($pokemon->image);
        $pokemon->delete();
        return true;
    }
}
