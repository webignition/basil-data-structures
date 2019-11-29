<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Assertion;

use webignition\BasilDataStructure\StatementInterface;

interface AssertionInterface extends StatementInterface
{
    public function getIdentifier(): string;
    public function getComparison(): string;
}
