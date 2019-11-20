<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Action;

interface ActionInterface
{
    public function getSource(): string;
    public function getType(): ?string;
    public function getArguments(): ?string;
}
