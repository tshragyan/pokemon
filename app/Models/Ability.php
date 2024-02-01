<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string title_en
 * @property string title_ru
 * @property string image
 */
class Ability extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'title_ru',
        'image',
    ];

    public function pokemon(): HasMany
    {
        return $this->hasMany(Pokemon::class, 'id', 'ability_id');
    }

}
