<?php

namespace App\Modules\Form\Mapper;

use App\Modules\Shared\DTO\SectionTransfer;

class SectionTransferMapper implements MapperInterFace
{
    /**
     * @param array $item
     * @param string $parentUUID
     *
     * @return mixed
     */
    public function map(array $item, string $parentUUID)
    {
        $sectionTransfer = new SectionTransfer();
        $sectionTransfer->setParentUuid($parentUUID);
        $sectionTransfer->setType('section');
        $sectionTransfer->setTitle($item['title']);
        $sectionTransfer->setUuid($item['uuid']);
        $sectionTransfer->setRepeat($item['repeat']);
        $sectionTransfer->setWeight($item['weight']);
        $sectionTransfer->setRequired($item['required']);

        return $sectionTransfer;
    }
}
