<?php

namespace App\Modules\Form\Repositories;

use App\Modules\Form\Models\Question;
use Illuminate\Database\Eloquent\Model;

class QuestionRepository implements RepositoryInterface
{
    /**
     * @param $transfer
     * @return Model
     */
    public function store($transfer): Model
    {
        $model = new Question();
        $model->uuid = $transfer->getUuid();
        $model->image_id = $transfer->getImageId();
        $model->required = $transfer->isRequired();
        $model->response_type = $transfer->getResponseType();
        $model->check_conditions_for = json_encode($transfer->getCheckConditionsFor());
        $model->categories = json_encode($transfer->getCategories());
        $model->negative = $transfer->isNegative();
        $model->notes_allowed = $transfer->isNotesAllowed();
        $model->photos_allowed = $transfer->isPhotosAllowed();
        $model->issues_allowed = $transfer->isIssuesAllowed();
        $model->responded = $transfer->isResponded();
        $model->params = json_encode($transfer->getParams());
        $model->save();

        return $model;
    }
}
