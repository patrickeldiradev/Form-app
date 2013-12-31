<?php

namespace App\Modules\Form;

use App\Modules\Form\Mapper\FormTransferMapper;
use App\Modules\Form\Mapper\MapperInterFace;
use App\Modules\Form\Mapper\PageTransferMapper;
use App\Modules\Form\Mapper\QuestionTransferMapper;
use App\Modules\Form\Mapper\SectionTransferMapper;
use App\Modules\Form\Repositories\FormItemRepository;
use App\Modules\Form\Repositories\FormRepository;
use App\Modules\Form\Repositories\PageRepository;
use App\Modules\Form\Repositories\QuestionRepository;
use App\Modules\Form\Repositories\RepositoryInterface;
use App\Modules\Form\Repositories\SectionRepository;
use App\Modules\Form\Services\FormCreator;
use App\Modules\Form\Services\FormCreatorInterface;
use App\Modules\Form\Services\FormPublisher;
use App\Modules\Form\Services\FormPublisherInterface;
use App\Modules\Form\Services\JsonParser;
use App\Modules\Form\Services\JsonParserInterface;
use App\Modules\Shared\Enum\FormItemTypeEnum;

class FormFactory
{
    /**
     * @return FormCreator
     */
    public function createFormCreator(): FormCreatorInterface
    {
        return new FormCreator(
            $this->createJsonParserService(),
            $this->createFormRepository(),
            $this->createFormItemRepository(),
        );
    }

    /**
     * @return FormPublisherInterface
     */
    public function createFormPublisher(): FormPublisherInterface
    {
        return new FormPublisher();
    }

    /**
     * @return JsonParserInterface
     */
    public function createJsonParserService(): JsonParserInterface
    {
        return new JsonParser($this);
    }

    /**
     * @return \App\Modules\Form\Repositories\FormItemRepository
     */
    public function createFormItemRepository()
    {
        return new FormItemRepository();
    }

    /**
     * @return RepositoryInterface
     */
    public function createFormRepository(): RepositoryInterface
    {
        return new FormRepository();
    }

    /**
     * @param string $type
     *
     * @return RepositoryInterface
     * @throws \Exception
     */
    public function getRepositoryType(string $type): RepositoryInterface
    {
        if ($type == FormItemTypeEnum::PAGE) {
            return new PageRepository();
        } elseif ($type == FormItemTypeEnum::QUESTION) {
            return new QuestionRepository();
        } elseif ($type == FormItemTypeEnum::SECTION) {
            return new SectionRepository();
        }

        throw new \Exception('Unsupported Repository Type.');
    }

    public function getMapper(string $type): MapperInterFace
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
