<?php

namespace App\Listeners;

use App\Bussiness\Facades\FormhandlerFacade;
use App\Events\FormCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
