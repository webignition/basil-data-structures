<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit\Test;

use webignition\BasilDataStructure\Test\Configuration;
use webignition\BasilDataStructure\Test\Imports;
use webignition\BasilDataStructure\Test\Test;

class TestTest extends \PHPUnit\Framework\TestCase
{
    public function testCreate()
    {
        $name = 'name';
        $configuration = new Configuration('', '');
        $imports = new Imports();

        $test = new Test($name, $configuration, $imports);

        $this->assertSame($name, $test->getName());
        $this->assertSame($configuration, $test->getConfiguration());
        $this->assertSame($imports, $test->getImports());
    }
}
