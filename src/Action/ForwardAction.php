<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Action;

class ForwardAction extends AbstractAction
{
    public const TYPE = 'forward';

    public function __construct(string $source, ?string $arguments = null)
    {
        parent::__construct($source, self::TYPE, $arguments);
    }
}
