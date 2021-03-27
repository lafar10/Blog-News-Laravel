<?php

namespace App\Listeners;

use App\Events\NewsViews;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsViewsIncrease
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
     * @param  object  $event
     * @return void
     */
    public function handle(NewsViews $event)
    {
        $this->increase($event->post);
    }

    function increase($counter)
    {
        $counter->views = $counter->views + 1;
        $counter->save();
    }
}
