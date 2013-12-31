<?php

namespace App\Modules\Form\Mapper;

use App\Modules\Shared\DTO\PageTransfer;

class PageTransferMapper implements MapperInterFace
{
    /**
     * @param array $item
     * @param string|null $parentUUID
     *
     * @return \App\Modules\Shared\DTO\PageTransfer
     */
    public function map(array $item, ?string $parentUUID)
    {
        $pageTransfer = new PageTransfer();
        $pageTransfer->setParentUuid($parentUUID);
        $pageTransfer->setType('page');
        $pageTransfer->setTitle($item['title']);
        $pageTransfer->setUuid($item['uuid']);
        $pageTransfer->setParams($item['params']);

        return $pageTransfer;
    }
}
