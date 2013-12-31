<?php

namespace App\Bussiness\Facades;

use App\Factory\FormFactory;

class FormHandler
{
    public function storeForm($data)
    {
        return $this->getFormFactory()->createFormCreator()->storeForm($data);
    }

    protected function getFormFactory()
    {
        return new FormFactory();
    }
}
