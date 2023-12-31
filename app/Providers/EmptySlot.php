<?php

namespace App\Providers;

use App\Providers\SlotAvailable;
use App\Models\Queue;
use App\Models\Client;
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
        if ($event->queue) {
            $queue = Queue::firstWhere('id', $event->queue);
            $queue->is_done = true;
            $queue->save();
        }

        $client = Client::firstWhere('name', $event->client);
        $client->is_empty = true;
        $client->save();
    }
}
