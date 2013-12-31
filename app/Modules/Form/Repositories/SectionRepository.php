<?php

namespace App\Modules\Form\Repositories;

use App\Modules\Form\Models\Section;
use Illuminate\Database\Eloquent\Model;

class SectionRepository implements RepositoryInterface
{
    /**
     * @param $transfer
     * @return Model
     */
    public function store($transfer): Model
    {
        $model = new Section();
        $model->uuid = $transfer->getUuid();
        $model->repeat = $transfer->isRepeat();
        $model->weight = $transfer->getWeight();
        $model->required = $transfer->isRequired();
        $model->save();

        return $model;
    }
}
