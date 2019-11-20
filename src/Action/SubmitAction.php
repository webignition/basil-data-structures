<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Action;

class SubmitAction extends AbstractInteractionAction
{
    public const TYPE = 'submit';

    public function __construct(string $arguments, string $identifier)
    {
        parent::__construct(self::TYPE, $arguments, $identifier);
    }
}
