<?php

namespace App\Modules\Form\Services;

use App\Modules\Form\Events\FormCreated;
use App\Modules\Form\FormFactory;
use App\Modules\Form\Repositories\RepositoryInterface;
use App\Modules\Shared\Enum\FormItemTypeEnum;

interface QuestionnaireSaverInterface
{
    /**
     * @param $data
     * @return void
     */
    public function storeAnswer($data): void;
}
