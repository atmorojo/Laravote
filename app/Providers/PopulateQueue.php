<?php

namespace App\Providers;

use App\Models\Queue;
use App\Providers\VoterValidated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PopulateQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(VoterValidated $event): void
    {
        $queue = new Queue;

        $queue->voter_ref = $event->voter;
        $queue->client_id = $event->client;

        $queue->save();
    }
}
