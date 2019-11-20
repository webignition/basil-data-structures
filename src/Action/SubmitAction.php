<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Action;

class SubmitAction extends AbstractInteractionAction
{
    public const TYPE = 'submit';

    public function __construct(string $source, string $arguments, string $identifier)
    {
        parent::__construct($source, self::TYPE, $arguments, $identifier);
    }
}
