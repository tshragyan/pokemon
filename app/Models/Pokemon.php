<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int id
 * @property string name
 * @property string image
 * @property int form_id
 * @property int location_id
 * @property int ability_id
 *
 * */
class Pokemon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'form_id',
        'ability_id',
        'location_id',
    ];

    protected $table = 'pokemons';

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }

    public function form(): BelongsTo
    {
        return $this->belongsTo(PokemonForm::class, 'form_id', 'id');
    }

    public function ability(): BelongsTo
    {
        return $this->belongsTo(Ability::class, 'form_id', 'id');
    }

}
