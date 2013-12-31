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
        $model = FormItem::updateOrCreate(
            ['uuid' => $transfer->getUuid()],
            [
                'form_id' => $transfer->getFormId(),
                'item_id' => $transfer->getItemId(),
                'item_type' => $transfer->getItemType(),
                'title' => $transfer->getTitle(),
                'parent_uuid' => $transfer->getParentUuid(),
            ],
        );

        return $model;
    }
}
