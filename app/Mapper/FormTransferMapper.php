<?php

namespace App\Mapper;

use App\DTO\FormTransfer;

class FormTransferMapper implements MapperInterFace
{
    /**
     * @param array $item
     * @param string|null $parentUUID
     *
     * @return FormTransfer
     */
    public function map(array $checkList, ?string $parentUUID)
    {
        $sectionTransfer = new FormTransfer();
        $sectionTransfer->setType('form');
        $sectionTransfer->setUuid($checkList['form']['uuid']);
        $sectionTransfer->setChecklistTitle($checkList['checklist_title']);
        $sectionTransfer->setChecklistDescription($checkList['checklist_description']);

        return $sectionTransfer;
    }
}
