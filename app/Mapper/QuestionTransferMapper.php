<?php

namespace App\Mapper;

use App\DTO\QuestionTransfer;

class QuestionTransferMapper implements MapperInterFace
{
    /**
     * @param array $item
     * @param string $parentUUID
     *
     * @return mixed
     */
    public function map(array $item, string $parentUUID)
    {
        $questionTransfer = new QuestionTransfer();
        $questionTransfer->setParentUuid($parentUUID);
        $questionTransfer->setType('question');
        $questionTransfer->setTitle($item['title']);
        $questionTransfer->setUuid($item['uuid']);
        $questionTransfer->setImageId($item['image_id']);
        $questionTransfer->setResponseType($item['response_type']);
        $questionTransfer->setRequired($item['required']);
        $questionTransfer->setParams($item['params']);
        $questionTransfer->setCheckConditionsFor($item['check_conditions_for']);
        $questionTransfer->setCategories($item['categories']);
        $questionTransfer->setNegative($item['negative']);
        $questionTransfer->setNotesAllowed($item['notes_allowed']);
        $questionTransfer->setPhotosAllowed($item['photos_allowed']);
        $questionTransfer->setIssuesAllowed($item['issues_allowed']);
        $questionTransfer->setResponded($item['responded']);

        return $questionTransfer;
    }
}
