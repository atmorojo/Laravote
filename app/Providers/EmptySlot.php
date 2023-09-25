<?php

namespace App\Providers;

use App\Providers\SlotAvailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmptySlot
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
    public function handle(SlotAvailable $event): void
    {
        $queue = Queue::firstWhere('voter_ref', $event->voter);
        $queue->is_done = true;
        $queue->save();

        $client = Client::firstWhere('name', $event->client_id);
        $client->is_empty = true;
        $client->save();
    }
}
