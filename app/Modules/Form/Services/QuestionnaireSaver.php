<?php

namespace App\Modules\Form\Services;

use App\Modules\Form\Events\QuestionnaireSubmitted;
use App\Modules\Form\Repositories\RepositoryInterface;
use App\Modules\Shared\Enum\FormItemTypeEnum;

class QuestionnaireSaver implements QuestionnaireSaverInterface
{
    /**
     * @var JsonParserInterface
     */
    protected JsonParserInterface $jsonParserService;

    /**
     * @var RepositoryInterface
     */
    protected RepositoryInterface $questionRepository;

    /**
     * @param JsonParserInterface $jsonParserService
     * @param RepositoryInterface $questionRepository
     */
    public function __construct(
        JsonParserInterface $jsonParserService,
        RepositoryInterface $questionRepository,
    ) {
        $this->jsonParserService = $jsonParserService;
        $this->questionRepository = $questionRepository;
    }

    /**
     * @param $data
     * @return void
     */
    public function storeAnswer($data): void
    {
        $parsedData = $this->jsonParserService->parse($data);

        foreach ($parsedData['items'] as $dataTransfer) {
            if (FormItemTypeEnum::QUESTION == $dataTransfer->getType()) {
                $form = $this->questionRepository->storeAnswer($dataTransfer);
            }
        }

        QuestionnaireSubmitted::dispatch($form);
    }
}
