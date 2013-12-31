<?php

namespace App\Modules\Shared\DTO;

class QuestionTransfer
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
     * @var int|null
     */
    protected ?int $imageId;

    /**
     * @var string
     */
    protected string $responseType;

    /**
     * @var bool
     */
    protected bool $required;

    /**
     * @var array
     */
    protected array $params;

    /**
     * @var array
     */
    protected array $checkConditionsFor;

    /**
     * @var array
     */
    protected array $categories;

    /**
     * @var bool
     */
    protected bool $negative;

    /**
     * @var bool
     */
    protected bool $notesAllowed;

    /**
     * @var bool
     */
    protected bool $photosAllowed;

    /**
     * @var bool
     */
    protected bool $issuesAllowed;

    /**
     * @var bool
     */
    protected bool $responded;

    /**
     * @var string
     */
    protected ?string $answer;

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
     * @return int|null
     */
    public function getImageId(): ?int
    {
        return $this->imageId;
    }

    /**
     * @param int|null $imageId
     * @return void
     */
    public function setImageId(?int $imageId): void
    {
        $this->imageId = $imageId;
    }


    /**
     * @return string
     */
    public function getResponseType(): string
    {
        return $this->responseType;
    }

    /**
     * @param string $responseType
     */
    public function setResponseType(string $responseType): void
    {
        $this->responseType = $responseType;
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

    /**
     * @return array
     */
    public function getCheckConditionsFor(): array
    {
        return $this->checkConditionsFor;
    }

    /**
     * @param array $checkConditionsFor
     */
    public function setCheckConditionsFor(array $checkConditionsFor): void
    {
        $this->checkConditionsFor = $checkConditionsFor;
    }

    /**
     * @return array
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * @param array $categories
     */
    public function setCategories(array $categories): void
    {
        $this->categories = $categories;
    }

    /**
     * @return bool
     */
    public function isNegative(): bool
    {
        return $this->negative;
    }

    /**
     * @param bool $negative
     */
    public function setNegative(bool $negative): void
    {
        $this->negative = $negative;
    }

    /**
     * @return bool
     */
    public function isNotesAllowed(): bool
    {
        return $this->notesAllowed;
    }

    /**
     * @param bool $notesAllowed
     */
    public function setNotesAllowed(bool $notesAllowed): void
    {
        $this->notesAllowed = $notesAllowed;
    }

    /**
     * @return bool
     */
    public function isPhotosAllowed(): bool
    {
        return $this->photosAllowed;
    }

    /**
     * @param bool $photosAllowed
     */
    public function setPhotosAllowed(bool $photosAllowed): void
    {
        $this->photosAllowed = $photosAllowed;
    }

    /**
     * @return bool
     */
    public function isIssuesAllowed(): bool
    {
        return $this->issuesAllowed;
    }

    /**
     * @param bool $issuesAllowed
     */
    public function setIssuesAllowed(bool $issuesAllowed): void
    {
        $this->issuesAllowed = $issuesAllowed;
    }

    /**
     * @return bool
     */
    public function isResponded(): bool
    {
        return $this->responded;
    }

    /**
     * @param bool $responded
     */
    public function setResponded(bool $responded): void
    {
        $this->responded = $responded;
    }

    /**
     * @return string
     */
    public function getAnswer(): string|null
    {
        return $this->answer;
    }

    /**
     * @param string $answer
     */
    public function setAnswer(?string $answer): void
    {
        $this->answer = $answer;
    }
}
