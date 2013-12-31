<?php

namespace App\Modules\Shared\DTO;

class RequestLogTransfer
{
    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $path;

    /**
     * @var string
     */
    public string $method;

    /**
     * @var int
     */
    public int $hits;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    /**
     * @return int
     */
    public function getHits(): int
    {
        return $this->hits;
    }

    /**
     * @param int $hits
     */
    public function setHits(int $hits): void
    {
        $this->hits = $hits;
    }
}
