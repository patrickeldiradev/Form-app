<?php

namespace App\Modules\Form\Service;

use App\Events\FormCreated;
use App\Modules\Form\FormFactory;
use App\Modules\Form\Repositories\FormItemRepository;
use App\Modules\Form\Repositories\FormRepository;
use App\Modules\Shared\Enum\FormItemTypeEnum;

class FormCreator
{
    /**
     * @var JsonParser
     */
    protected JsonParser $jsonParserService;

    /**
     * @var \App\Modules\Form\Repositories\FormRepository
     */
    protected FormRepository $formRepository;

    /**
     * @var FormItemRepository
     */
    protected FormItemRepository $formItemRepository;

    /**
     * @param JsonParser $jsonParserService
     * @param \App\Modules\Form\Repositories\FormRepository $formRepository
     * @param FormItemRepository $formItemRepository
     */
    public function __construct(
        JsonParser $jsonParserService,
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
