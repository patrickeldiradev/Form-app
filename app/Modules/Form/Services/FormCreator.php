<?php

namespace App\Modules\Form\Services;

use App\Modules\Form\Events\FormCreated;
use App\Modules\Form\FormFactory;
use App\Modules\Form\Repositories\RepositoryInterface;
use App\Modules\Shared\Enum\FormItemTypeEnum;

class FormCreator implements FormCreatorInterface
{
    /**
     * @var JsonParserInterface
     */
    protected JsonParserInterface $jsonParserService;

    /**
     * @var RepositoryInterface
     */
    protected RepositoryInterface $formRepository;

    /**
     * @var RepositoryInterface
     */
    protected RepositoryInterface $formItemRepository;

    /**
     * @param JsonParserInterface $jsonParserService
     * @param RepositoryInterface $formRepository
     * @param RepositoryInterface $formItemRepository
     */
    public function __construct(
        JsonParserInterface $jsonParserService,
        RepositoryInterface $formRepository,
        RepositoryInterface $formItemRepository
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
    public function storeForm($data): void
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
