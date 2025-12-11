<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $casts = ['watched' => 'boolean'];
    protected $fillable = ['episode_number'];

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function scopeWatched(Builder $query)
    {
        $query->where('watched', true);
    }

    // /**
    //  * Get (Accessors) and set (Mutators) the watched attribute as a boolean.
    //  *
    //  * @return Attribute
    //  */
    // protected function watched(): Attribute
    // {
    //     return new Attribute(
    //         get: fn ($watched) => (bool) $watched,
    //         set: fn ($watched) => (bool) $watched
    //     );
    // }
}
