<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure;

class Page
{
    private $url;
    private $elements;

    public function __construct(string $url, array $elements = [])
    {
        $this->url = $url;
        $this->elements = $elements;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getElements(): array
    {
        return $this->elements;
    }
}
