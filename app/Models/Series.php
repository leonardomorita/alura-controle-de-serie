<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    // Informar os campos que vão poder ser atribuídos com mass assignment.
    protected $fillable = ['name', 'cover'];

    protected $table = 'series';
    protected $appends = ['links'];

    // Se toda vez precisar da tabela temporadas (seasons)
    // protected $with = ['seasons'];

    public function seasons()
    {
        return $this->hasMany(Season::class, 'series_id');
    }

    /**
     * Obtém todos os episódios de todas as temporadas de uma série.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function episodes()
    {
        return $this->hasManyThrough(Episode::class, Season::class);
    }

    /**
     * Obtém os links relacionados à série.
     *
     * @return Attribute
     */
    public function links(): Attribute
    {
        return new Attribute(
            get: fn () => [
                [
                    'rel' => 'self',
                    'url' => route('api.series.show', ['series' => $this->id])
                ],
                [
                    'rel' => 'seasons',
                    'url' => route('api.series.seasons.index', ['series' => $this->id])
                ],
                [
                    'rel' => 'episodes',
                    'url' => route('api.series.all.episodes', ['series' => $this->id])
                ]
            ]
        );
    }

    // Exemplo de escopo local
    // public function scopeActive(Builder $builder)
    // {
    //     return $builder->where('active', '=', true);
    // }

    protected static function booted()
    {
        self::addGlobalScope('ordered', function(Builder $builder) {
            $builder->orderBy('name');
        });
    }
}
