<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Action;

class ForwardAction extends AbstractAction
{
    public const TYPE = 'forward';

    public function __construct(?string $arguments = null)
    {
        parent::__construct(self::TYPE, $arguments);
    }
}
