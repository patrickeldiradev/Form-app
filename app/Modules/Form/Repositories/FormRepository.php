<?php

namespace App\Modules\Form\Repositories;

use App\Modules\Form\Models\Form;
use Illuminate\Database\Eloquent\Model;

class FormRepository implements RepositoryInterface
{
    /**
     * @param $transfer
     * @return Model
     */
    public function store($transfer): Model
    {
        $model = Form::updateOrCreate(
            ['uuid' => $transfer->getUuid()],
            [
                'checklist_title' => $transfer->getChecklistTitle(),
                'checklist_description' => $transfer->getChecklistDescription(),
                'type' => $transfer->getType(),
            ]
        );

        return $model;
    }
}
