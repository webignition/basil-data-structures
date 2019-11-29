<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Action;

use webignition\BasilDataStructure\StatementInterface;

interface ActionInterface extends StatementInterface
{
    public function getType(): string;
    public function getArguments(): string;
}
