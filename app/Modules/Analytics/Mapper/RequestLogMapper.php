<?php

namespace App\Modules\Analytics\Mapper;

use App\Modules\Shared\DTO\RequestLogTransfer;
use Illuminate\Support\Collection;

class RequestLogMapper
{
    public function map(Collection $dataCollection): Collection
    {
        $dataCollection->transform(function ($item) {
            $requestLogTransfer = new RequestLogTransfer();
            $requestLogTransfer->setName($item->name);
            $requestLogTransfer->setPath($item->path);
            $requestLogTransfer->setMethod($item->method);
            $requestLogTransfer->setHits($item->hits);

            return $requestLogTransfer;
        });

        return $dataCollection;
    }
}
