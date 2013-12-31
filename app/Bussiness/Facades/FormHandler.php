<?php

namespace App\Bussiness\Facades;

use App\Factory\FormFactory;

class FormHandler
{
    public function storeForm($data)
    {
        return $this->getFormFactory()->createFormCreator()->storeForm($data);
    }

    public function publishForm($form)
    {
        return $this->getFormFactory()->createFormPublisher()->publish($form);
    }

    protected function getFormFactory()
    {
        return new FormFactory();
    }
}
