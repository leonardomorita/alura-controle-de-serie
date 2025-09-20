<?php

namespace App\Listeners;

use App\Events\SeriesDestroy;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;

class DeleteSeriesCover implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SeriesDestroy  $event
     * @return void
     */
    public function handle(SeriesDestroy $event)
    {
        if ($event->seriesCoverPath && Storage::disk('public')->exists($event->seriesCoverPath)) {
            Storage::disk('public')->delete($event->seriesCoverPath);
        }
    }
}
