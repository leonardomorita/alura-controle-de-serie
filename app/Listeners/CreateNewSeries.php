<?php

namespace App\Listeners;

use App\Events\CreateNewSeries as EventsCreateNewSeries;
use App\Repositories\SeriesRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateNewSeries
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(private SeriesRepository $seriesRepository)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param EventsCreateNewSeries $event
     * @return void
     */
    public function handle(EventsCreateNewSeries $event)
    {
        $coverPath = $event->request->file('cover')->store('series_cover', 'public');
        $event->request->coverPath = $coverPath;

        $series = $this->seriesRepository->add($event->request);

        if ($series->id) {
            $event->series = $series;
        }
    }
}
