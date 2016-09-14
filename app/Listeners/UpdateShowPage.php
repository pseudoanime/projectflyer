<?php

namespace App\Listeners;

use App\Events\PhotoHasBeenAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;

class UpdateShowPage
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
     * @param  PhotoHasBeenAdded  $event
     * @return void
     */
    public function handle(PhotoHasBeenAdded $event)
    {
        Log::debug("A PhotoHasBeenAdded");
    }
}
