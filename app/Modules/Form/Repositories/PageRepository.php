<?php

namespace App\Modules\Form\Repositories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Model;

class PageRepository implements RepositoryInterface
{
    /**
     * @param $transfer
     * @return Model
     */
    public function store($transfer): Model
    {
        $model = new Page();
        $model->uuid = $transfer->getUuid();
        $model->params = json_encode($transfer->getParams());
        $model->save();

        return $model;
    }
}
