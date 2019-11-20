<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Action;

class ReloadAction extends AbstractAction
{
    public const TYPE = 'reload';

    public function __construct(?string $arguments = null)
    {
        parent::__construct(self::TYPE, $arguments);
    }
}
