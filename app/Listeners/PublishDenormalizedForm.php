<?php

namespace App\Listeners;

use App\Facades\FormHandlerFacade;
use App\Events\FormCreated;

class PublishDenormalizedForm
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
     * @param  \App\Events\FormCreated  $event
     * @return void
     */
    public function handle(FormCreated $event)
    {
        FormHandlerFacade::publishForm($event->form);
    }
}
