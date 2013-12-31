<?php

namespace App\Modules\Shared\DTO;

class FormTransfer
{
    /**
     * @var string
     */
    protected string $uuid;

    /**
     * @var string
     */
    protected string $type;

    /**
     * @var string
     */
    protected string $checklistTitle;

    /**
     * @var string
     */
    protected string $checklistDescription;

    /**
     * @var array
     */
    protected array $items;

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getChecklistTitle(): string
    {
        return $this->checklistTitle;
    }

    /**
     * @param string $checklistTitle
     */
    public function setChecklistTitle(string $checklistTitle): void
    {
        $this->checklistTitle = $checklistTitle;
    }

    /**
     * @return string
     */
    public function getChecklistDescription(): string
    {
        return $this->checklistDescription;
    }

    /**
     * @param string $checklistDescription
     */
    public function setChecklistDescription(string $checklistDescription): void
    {
        $this->checklistDescription = $checklistDescription;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }
}
