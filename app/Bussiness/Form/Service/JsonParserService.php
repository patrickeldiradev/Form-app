<?php

namespace App\Bussiness\Form\Service;

use App\Factory\MapperFactory;

class JsonParserService
{
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
        $mapperFactory = new MapperFactory();
        $mapper = $mapperFactory->initializeMapper('form');

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
            $mapperFactory = new MapperFactory();
            $mapper = $mapperFactory->initializeMapper($item['type']);
            $this->formItems[] = $mapper->map($item, $parentUUID);

            if (!empty($item['items'])) {
                $this->formItemsParser($item['items'], $item['uuid']);
            }
        }
    }
}
