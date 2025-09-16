<?php

namespace App\Listeners;

use App\Events\SeriesCreated as EventsSeriesCreated;
use App\Mail\SeriesCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailUsersAboutSeriesCreated implements ShouldQueue
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
     * @param EventsSeriesCreated $event
     * @return void
     */
    public function handle(EventsSeriesCreated $event)
    {
        // Mail::to($request->user())->send($email);
        $users = \App\Models\User::all();
        foreach ($users as $index => $user) {
            $email = new SeriesCreated($event->seriesName, $event->seriesId, $event->seriesSeasonQty, $event->seriesEpisodePerSeason);

            // Envio do e-mail de forma síncrona
            // Mail::to($user)->send($email);
            // sleep(2);

            // Envio do e-mail de forma assíncrona
            // Mail::to($user)->queue($email);
            $delay = now()->addSeconds($index * 10);
            Mail::to($user)->later($delay, $email);
        }
    }
}
