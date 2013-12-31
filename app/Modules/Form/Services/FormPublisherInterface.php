<?php

namespace App\Modules\Form\Services;

use App\Modules\Form\Models\Form;
use App\Modules\Form\Models\FormStorage;
use Illuminate\Support\Facades\Redis;

interface FormPublisherInterface
{
    /**
     * @param \App\Modules\Form\Models\Form $form
     * @return void
     */
    public function publish(Form $form): void;
}
