<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Assertion;

class ComparisonAssertion extends Assertion implements ComparisonAssertionInterface
{
    private $value;

    public function __construct(string $source, string $identifier, string $comparison, string $value)
    {
        parent::__construct($source, $identifier, $comparison);

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
