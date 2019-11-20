<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Action;

class WaitAction extends AbstractAction
{
    public const TYPE = 'wait';

    private $duration;

    public function __construct(string $duration)
    {
        parent::__construct(self::TYPE, $duration);

        $this->duration = $duration;
    }

    public function getDuration(): string
    {
        return $this->duration;
    }
}
