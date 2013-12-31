<?php

namespace App\Factory;

use App\Mapper\FormTransferMapper;
use App\Mapper\MapperInterFace;
use App\Mapper\PageTransferMapper;
use App\Mapper\QuestionTransferMapper;
use App\Mapper\SectionTransferMapper;

class MapperFactory
{
    /**
     * @param string $type
     *
     * @return MapperInterFace
     * @throws \Exception
     */
    public function initializeMapper(string $type): MapperInterFace
    {
        if ($type == 'page') {
            return new PageTransferMapper();
        } elseif ($type == 'question') {
            return new QuestionTransferMapper();
        } elseif ($type == 'section') {
            return new SectionTransferMapper();
        } elseif ($type == 'form') {
            return new FormTransferMapper();
        }

        throw new \Exception('Unsupported Mapper Type.');
    }
}
