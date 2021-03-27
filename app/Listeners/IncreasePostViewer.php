<?php

namespace App\Listeners;

use App\Events\PostViewer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreasePostViewer
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
    public function handle(PostViewer $event)
    {
        $this->updateviewer($event->post);
    }

    function updateviewer($post)
    {
        $post->views = $post->views + 1;
        $post->save();
    }
}
