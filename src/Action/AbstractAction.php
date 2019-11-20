<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Action;

abstract class AbstractAction
{
    private $type;
    private $arguments;

    public function __construct(string $type, ?string $arguments = null)
    {
        $this->type = $type;
        $this->arguments = $arguments;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getArguments(): ?string
    {
        return $this->arguments;
    }
}
