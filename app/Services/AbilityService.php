<?php

namespace App\Services;

use App\Models\Ability;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\File;

class AbilityService
{
    public function create(array $data): Ability
    {
        $ability = new Ability();
        $ability->title_ru = $data['title_ru'];
        $ability->title_en = $data['title_en'];
        $ability->image = imageUploadHelper($data['image'], "images");
        $ability->save();

        return $ability;
    }

    public function findById(int $id): Ability|null
    {
        return Ability::find($id);
    }

    public function getList(): Collection
    {
        return Ability::all();
    }

    public function update($data, Ability $ability): Ability
    {
        $ability->title_ru = $data['title_ru'];
        $ability->title_en = $data['title_en'];
        File::delete($ability->image);
        $ability->image = imageUploadHelper($data['image'], "images");
    }

    public function delete(Ability $ability): bool
    {
        File::delete($ability->image);
        $ability->delete();
        return true;
    }
}
