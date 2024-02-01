<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string country
 * @property string city
 * @property string street
 */
class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'city',
        'street',
    ];

    public function pokemon(): HasOne
    {
        return $this->hasOne(Pokemon::class, 'id', 'location_id');
    }
}
