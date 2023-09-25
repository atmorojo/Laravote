<?php

namespace App\Providers;

use App\Providers\SlotOccupied;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FillSlot
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
    public function handle(SlotOccupied $event): void
    {
        $client = \App\Models\Client::firstWhere('name', $event->client_id);
        $client->is_empty = false;
        $client->save();
    }
}
