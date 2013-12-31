<?php

namespace App\Modules\Shared\DTO;

class SectionTransfer
{
    /**
     * @var string
     */
    protected string $parentUuid;

    /**
     * @var string
     */
    protected string $type;

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
     * @var string
     */
    protected string $title;

    /**
     * @var string
     */
    protected string $uuid;

    /**
     * @var bool
     */
    protected bool $repeat;

    /**
     * @var int
     */
    protected int $weight;

    /**
     * @var bool
     */
    protected bool $required;

    /**
     * @var array
     */
    protected array $items;

    /**
     * @return string|null
     */
    public function getParentUuid(): string|null
    {
        return $this->parentUuid;
    }

    /**
     * @param string $parentUuid
     */
    public function setParentUuid(string $parentUuid): void
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
     * @return bool
     */
    public function isRepeat(): bool
    {
        return $this->repeat;
    }

    /**
     * @param bool $repeat
     */
    public function setRepeat(bool $repeat): void
    {
        $this->repeat = $repeat;
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     */
    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return bool
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * @param bool $required
     */
    public function setRequired(bool $required): void
    {
        $this->required = $required;
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
