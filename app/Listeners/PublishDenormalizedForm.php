<?php

namespace App\Listeners;

use App\Bussiness\Form\Facades\FormhandlerFacade;
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
        FormhandlerFacade::publishForm($event->form);
    }
}
