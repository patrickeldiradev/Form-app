<?php

namespace App\Modules\Form\Services;

use App\Modules\Form\Events\FormCreated;
use App\Modules\Form\FormFactory;
use App\Modules\Form\Repositories\FormItemRepository;
use App\Modules\Form\Repositories\FormRepository;
use App\Modules\Shared\Enum\FormItemTypeEnum;

interface FormCreatorInterface
{
    /**
     * @param $data
     * @return void
     * @throws \Exception
     */
    public function storeForm($data): void;
}
