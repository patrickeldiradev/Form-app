<?php

namespace App\Modules\Form\Mapper;

interface MapperInterFace
{
    /**
     * @param array $item
     * @param string $parentUUID
     *
     * @return mixed
     */
    public function map(array $item, string $parentUUID);
}
