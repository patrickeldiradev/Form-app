<?php

namespace App\Modules\Form\Repositories;

use App\Models\Form;
use Illuminate\Database\Eloquent\Model;

class FormRepository implements RepositoryInterface
{
    /**
     * @param $transfer
     * @return Model
     */
    public function store($transfer): Model
    {
        $model = new Form();
        $model->uuid = $transfer->getUuid();
        $model->checklist_title = $transfer->getChecklistTitle();
        $model->checklist_description = $transfer->getChecklistDescription();
        $model->type = $transfer->getType();
        $model->save();

        return $model;
    }
}
