<?php

namespace App\DTO;

class PageTransfer
{
    /**
     * @var string|null
     */
    protected ?string $parentUuid;

    /**
     * @var string
     */
    protected string $type;

    /**
     * @var string
     */
    protected string $title;

    /**
     * @var string
     */
    protected string $uuid;

    /**
     * @var int
     */
    protected string $itemId;

    /**
     * @var string
     */
    protected string $itemType;

    /**
     * @var int
     */
    protected int $formId;

    /**
     * @var array
     */
    protected array $params;

    /**
     * @return string|null
     */
    public function getParentUuid(): string|null
    {
        return $this->parentUuid;
    }

    /**
     * @param string|null $parentUuid
     * @return void
     */
    public function setParentUuid(?string $parentUuid): void
    {
        $this->parentUuid = $parentUuid;
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

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
    public function getItemType(): string
    {
        return $this->itemType;
    }

    /**
     * @param string $itemType
     */
    public function setItemType(string $itemType): void
    {
        $this->itemType = $itemType;
    }

    /**
     * @return int
     */
    public function getItemId(): int|string
    {
        return $this->itemId;
    }

    /**
     * @param int $itemId
     */
    public function setItemId(int|string $itemId): void
    {
        $this->itemId = $itemId;
    }

    /**
     * @return int
     */
    public function getFormId(): int
    {
        return $this->formId;
    }

    /**
     * @param int $formId
     */
    public function setFormId(int $formId): void
    {
        $this->formId = $formId;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param array $params
     */
    public function setParams(array $params): void
    {
        $this->params = $params;
    }
}
