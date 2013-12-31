<?php

namespace App\Bussiness;

use App\Bussiness\Service\JsonParserService;
use App\Enum\FormItemTypeEnum;
use App\Events\FormCreated;
use App\Factory\FormFactory;
use App\Repositories\FormItemRepository;
use App\Repositories\FormRepository;

class FormCreator
{
    /**
     * @var JsonParserService
     */
    protected JsonParserService $jsonParserService;

    /**
     * @var FormRepository
     */
    protected FormRepository $formRepository;

    /**
     * @var FormItemRepository
     */
    protected FormItemRepository $formItemRepository;

    /**
     * @param JsonParserService $jsonParserService
     * @param FormRepository $formRepository
     * @param FormItemRepository $formItemRepository
     */
    public function __construct(
        JsonParserService $jsonParserService,
        FormRepository $formRepository,
        FormItemRepository $formItemRepository
    ) {
        $this->jsonParserService = $jsonParserService;
        $this->formRepository = $formRepository;
        $this->formItemRepository = $formItemRepository;
    }

    /**
     * @param $data
     * @return void
     * @throws \Exception
     */
    public function storeForm($data)
    {
        $parsedData = $this->jsonParserService->parse($data);
        $createdForm = $this->formRepository->store($parsedData['form']);

        foreach ($parsedData['items'] as $dataTransfer) {
            $formItemType = $this->getFormFactory()
                ->getRepositoryType($dataTransfer->getType())
                ->store($dataTransfer);

            $dataTransfer->setItemId($formItemType->id);
            $dataTransfer->setItemType(
                FormItemTypeEnum::getType($dataTransfer->getType())
            );
            $dataTransfer->setFormId($createdForm->id);

            $this->formItemRepository->store($dataTransfer);
        }

        FormCreated::dispatch($createdForm);
    }

    /**
     * @return FormFactory
     */
    protected function getFormFactory(): FormFactory
    {
        return new FormFactory();
    }
}
