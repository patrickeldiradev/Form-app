<?php

namespace App\Modules\Form\Mapper;

use App\Modules\Shared\DTO\FormTransfer;

class FormTransferMapper implements MapperInterFace
{
    /**
     * @param array $item
     * @param string|null $parentUUID
     *
     * @return \App\Modules\Shared\DTO\FormTransfer
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
