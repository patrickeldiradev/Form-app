<?php

namespace App\Modules\Shared\Enum;

class FormItemTypeEnum
{
    const PAGE = 'page';
    const PAGE_MODEL = 'App\Modules\Form\Models\Page';
    const SECTION = 'section';
    const SECTION_MODEL = 'App\Modules\Form\Models\Section';
    const QUESTION = 'question';
    const QUESTION_MODEL = 'App\Modules\Form\Models\Question';
    const FORM = 'form';
    const FORM_MODEL = 'App\Modules\Form\Models\Form';

    /**
     * @param $type
     * @return string
     */
    public static function getType($type): string
    {
        return static::availableTypes()[$type];
    }

    /**
     * @return string[]
     */
    public static function availableTypes(): array
    {
        return [
            static::PAGE => static::PAGE_MODEL,
            static::SECTION => static::SECTION_MODEL,
            static::QUESTION => static::QUESTION_MODEL,
            static::FORM => static::FORM_MODEL,
        ];
    }
}
