<?php

namespace App\Modules\Form;

use App\Modules\Shared\Base\BaseFacade;

/**
 * @method \App\Modules\Form\FormFactory getFactory()
 */
class FormFacade extends BaseFacade implements FormFacadeInterface
{
    /**
     * @param $data
     * @return void
     * @throws \Exception
     */
    public function storeForm($data): void
    {
        $this->getFactory()->createFormCreator()->storeForm($data);
    }

    /**
     * @param $form
     * @return void
     */
    public function publishForm($form): void
    {
        $this->getFactory()->createFormPublisher()->publish($form);
    }
}
