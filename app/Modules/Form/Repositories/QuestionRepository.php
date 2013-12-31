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
        $model = Question::updateOrCreate(
            ['uuid' => $transfer->getUuid()],
            [
                'image_id' => $transfer->getImageId(),
                'required' => $transfer->isRequired(),
                'response_type' => $transfer->getResponseType(),
                'check_conditions_for' => json_encode($transfer->getCheckConditionsFor()),
                'categories' => json_encode($transfer->getCategories()),
                'negative' => $transfer->isNegative(),
                'notes_allowed' => $transfer->isNotesAllowed(),
                'photos_allowed' => $transfer->isPhotosAllowed(),
                'issues_allowed' => $transfer->isIssuesAllowed(),
                'responded' => $transfer->isResponded(),
                'params' => json_encode($transfer->getParams()),
                'answer' => $transfer->getAnswer(),
            ]
        );

        return $model;
    }

    public function storeAnswer($transfer): Model
    {
        $model = Question::updateOrCreate(
            ['uuid' => $transfer->getUuid()],
            [
                'image_id' => $transfer->getImageId(),
                'required' => $transfer->isRequired(),
                'response_type' => $transfer->getResponseType(),
                'check_conditions_for' => json_encode($transfer->getCheckConditionsFor()),
                'categories' => json_encode($transfer->getCategories()),
                'negative' => $transfer->isNegative(),
                'notes_allowed' => $transfer->isNotesAllowed(),
                'photos_allowed' => $transfer->isPhotosAllowed(),
                'issues_allowed' => $transfer->isIssuesAllowed(),
                'responded' => $transfer->isResponded(),
                'params' => json_encode($transfer->getParams()),
                'answer' => $transfer->getAnswer(),
            ]
        );

        return $model->formItem->form;
    }
}
