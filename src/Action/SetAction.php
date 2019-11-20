<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Action;

class SetAction extends AbstractInteractionAction
{
    public const TYPE = 'set';

    private $value;

    public function __construct(string $source, string $arguments, string $identifier, string $value)
    {
        parent::__construct($source, self::TYPE, $arguments, $identifier);

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
