<?php

namespace App\Events;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateNewSeries
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Series $series;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        public readonly SeriesFormRequest $request
    ) {

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
