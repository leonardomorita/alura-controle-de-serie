<?php

namespace Tests\Feature;

use App\Http\Requests\SeriesFormRequest;
use App\Repositories\EloquentSeriesRepository;
use App\Repositories\SeriesRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeriesRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * When a series is created, its seasons and episodes must be created.
     *
     * @return void
     */
    public function test_when_a_series_is_created_its_seasons_and_episodes_must_be_created()
    {
        // Preparar o cenário de testes (Arrange)

        /** @var EloquentSeriesRepository $repository */
        $repository = $this->app->make(SeriesRepository::class);

        $request = new SeriesFormRequest();
        $request->name = "Teste";
        $request->seasonQty = 1;
        $request->episodePerSeason = 1;

        // Executar o teste (Act)

        $repository->add($request);

        // Verificar o resultado (Assert)

        $this->assertDatabaseHas('series', ['name' => $request->name]);
        $this->assertDatabaseHas('seasons', ['season_number' => $request->seasonQty]);
        $this->assertDatabaseHas('episodes', ['episode_number' => $request->episodePerSeason]);
    }
}
