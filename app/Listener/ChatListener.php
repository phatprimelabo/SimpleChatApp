<?php

namespace App\Listener;

use \App\Event\Chat;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChatListener
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
     * @param  Chat  $event
     * @return void
     */
    public function handle(Chat $event)
    {
        //
    }
}
