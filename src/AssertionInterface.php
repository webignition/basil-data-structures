<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure;

interface AssertionInterface extends StatementInterface
{
    public function getIdentifier(): ?string;
    public function getComparison(): ?string;
    public function getValue(): ?string;
}
