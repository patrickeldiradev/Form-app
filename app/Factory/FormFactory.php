<?php

namespace App\Factory;

use App\Bussiness\FormCreator;
use App\Bussiness\Service\JsonParserService;
use App\Enum\FormItemTypeEnum;
use App\Repositories\FormItemRepository;
use App\Repositories\FormRepository;
use App\Repositories\PageRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\RepositoryInterface;
use App\Repositories\SectionRepository;

class FormFactory
{
    /**
     * @return FormCreator
     */
    public function createFormCreator(): FormCreator
    {
        return new FormCreator(
            $this->createJsonParserService(),
            $this->createFormRepository(),
            $this->createFormItemRepository(),
        );
    }

    /**
     * @return JsonParserService
     */
    public function createJsonParserService()
    {
        return new JsonParserService();
    }

    /**
     * @return FormItemRepository
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
}
