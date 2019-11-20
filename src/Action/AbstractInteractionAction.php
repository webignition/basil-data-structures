<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Action;

abstract class AbstractInteractionAction extends AbstractAction
{
    private $identifier;

    public function __construct(string $type, string $arguments, string $identifier)
    {
        parent::__construct($type, $arguments);

        $this->identifier = $identifier;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }
}