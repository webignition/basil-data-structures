<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Action;

class Action implements ActionInterface
{
    private $source;
    private $type;
    private $arguments;

    public function __construct(string $source, ?string $type, ?string $arguments = null)
    {
        $this->source = $source;
        $this->type = $type;
        $this->arguments = $arguments;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getArguments(): ?string
    {
        return $this->arguments;
    }
}
