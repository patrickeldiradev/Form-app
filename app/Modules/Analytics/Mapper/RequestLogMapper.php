<?php

namespace App\Modules\Analytics\Mapper;

use App\Modules\Analytics\Models\RequestLog;
use App\Modules\Shared\DTO\RequestLogTransfer;
use Illuminate\Support\Collection;

class RequestLogMapper
{
    public function mapCollection(Collection $dataCollection): Collection
    {
        $dataCollection->transform(function ($item) {
            return $this->map($item);
        });

        return $dataCollection;
    }

    public function map(RequestLog $item): RequestLogTransfer
    {
        $requestLogTransfer = new RequestLogTransfer();
        $requestLogTransfer->setName($item->name);
        $requestLogTransfer->setPath($item->path);
        $requestLogTransfer->setMethod($item->method);
        $requestLogTransfer->setHits($item->hits);

        return $requestLogTransfer;
    }
}
