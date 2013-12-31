<?php

namespace App\Modules\Form\Listeners;

use App\Facades\FormHandlerFacade;
use App\Modules\Form\Events\FormCreated;

class PublishDenormalizedForm
{
    /**
     * Handle the event.
     *
     * @param  \App\Modules\Form\Events\FormCreated  $event
     * @return void
     */
    public function handle(FormCreated $event)
    {
        FormHandlerFacade::publishForm($event->form);
    }
}
