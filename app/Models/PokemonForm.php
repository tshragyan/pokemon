<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string title
 */
class PokemonForm extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function pakemon(): HasOne
    {
        return $this->hasOne(Pokemon::class, 'id', 'form_id');
    }
}
