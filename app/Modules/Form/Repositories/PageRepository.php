<?php

namespace App\Modules\Form\Repositories;

use App\Modules\Form\Models\Page;
use Illuminate\Database\Eloquent\Model;

class PageRepository implements RepositoryInterface
{
    /**
     * @param $transfer
     * @return Model
     */
    public function store($transfer): Model
    {
        $model = Page::updateOrCreate(
            ['uuid' => $transfer->getUuid()],
            ['params' => json_encode($transfer->getParams()),]
        );

        return $model;
    }
}
