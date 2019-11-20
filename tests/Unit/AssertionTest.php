<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit;

use webignition\BasilDataStructure\Assertion;

class AssertionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider createDataProvider
     */
    public function testCreate(string $source, ?string $identifier, ?string $comparison, ?string $value)
    {
        $assertion = new Assertion($source, $identifier, $comparison, $value);

        $this->assertSame($source, $assertion->getSource());
        $this->assertSame($identifier, $assertion->getIdentifier());
        $this->assertSame($comparison, $assertion->getComparison());
        $this->assertSame($value, $assertion->getValue());
    }

    public function createDataProvider(): array
    {
        return [
            'empty' => [
                'source' => '',
                'identifier' => null,
                'comparison' => null,
                'value' => null,
            ],
            'without value' => [
                'source' => '".selector" exists',
                'identifier' => '".selector"',
                'comparison' => 'exists',
                'value' => null,
            ],
            'has all values' => [
                'source' => '$page.title is "Example"',
                'identifier' => '$page.title',
                'comparison' => 'is',
                'value' => '"Example"',
            ],
        ];
    }
}
