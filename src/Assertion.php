<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure;

class Assertion implements AssertionInterface
{
    private $source;
    private $identifier;
    private $comparison;
    private $value;

    public function __construct(string $source, ?string $identifier, ?string $comparison, ?string $value = null)
    {
        $this->source = $source;
        $this->identifier = $identifier;
        $this->comparison = $comparison;
        $this->value = $value;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function getComparison(): ?string
    {
        return $this->comparison;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }
}
