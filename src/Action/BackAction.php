<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Action;

class BackAction extends AbstractAction
{
    public const TYPE = 'back';

    public function __construct(?string $arguments = null)
    {
        parent::__construct(self::TYPE, $arguments);
    }
}
