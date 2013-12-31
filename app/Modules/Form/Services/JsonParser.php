<?php

namespace App\Modules\Form\Services;

use App\Modules\Form\FormFactory;

class JsonParser implements JsonParserInterface
{
    protected FormFactory $formFactory;

    /**
     * @param FormFactory $formFactory
     */
    public function __construct(FormFactory $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    /**
     * @var array
     */
    public array $formItems= [];

    /**
     * @param array $checkList
     *
     * @return array
     */
    public function parse(array $checkList): array
    {
        $this->formItemsParser($checkList['form']['items']);

        return [
            'form' => $this->formParser($checkList),
            'items' => $this->formItems,
        ];
    }

    /**
     * @param array $checkList
     *
     * @return mixed
     */
    protected function formParser(array $checkList)
    {
        $mapper = $this->formFactory->getMapper('form');

        return $mapper->map($checkList, null);
    }

    /**
     * @param array $items
     * @param string|null $parentUUID
     * @return void
     *
     * @throws \Exception
     */
    protected function formItemsParser(array $items, string $parentUUID = null): void
    {
        foreach ($items as $item) {
            $mapper = $this->formFactory->getMapper($item['type']);
            $this->formItems[] = $mapper->map($item, $parentUUID);

            if (!empty($item['items'])) {
                $this->formItemsParser($item['items'], $item['uuid']);
            }
        }
    }
}
