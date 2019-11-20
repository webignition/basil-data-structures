<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit;

use webignition\BasilDataStructure\Assertion;

class AssertionTest extends \PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $source = '$page.title is "Example"';
        $identifier = '$page.title';
        $comparison = 'is';
        $value = 'Example';

        $assertion = new Assertion($source, $identifier, $comparison, $value);

        $this->assertSame($source, $assertion->getSource());
        $this->assertSame($identifier, $assertion->getIdentifier());
        $this->assertSame($comparison, $assertion->getComparison());
        $this->assertSame($value, $assertion->getValue());
    }
}
