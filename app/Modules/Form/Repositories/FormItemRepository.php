<?php

namespace App\Modules\Form\Repositories;

use App\Modules\Form\Models\FormItem;
use Illuminate\Database\Eloquent\Model;

class FormItemRepository implements RepositoryInterface
{
    /**
     * @param $transfer
     * @return Model
     */
    public function store($transfer): Model
    {
        $model = new FormItem();
        $model->uuid = $transfer->getUuid();
        $model->form_id = $transfer->getFormId();
        $model->item_id = $transfer->getItemId();
        $model->item_type = $transfer->getItemType();
        $model->title = $transfer->getTitle();
        $model->parent_uuid = $transfer->getParentUuid();
        $model->save();

        return $model;
    }
}
