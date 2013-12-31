<?php

namespace App\Modules\Form\Services;

interface JsonParserInterface
{
    /**
     * @param array $checkList
     *
     * @return array
     */
    public function parse(array $checkList): array;
}
