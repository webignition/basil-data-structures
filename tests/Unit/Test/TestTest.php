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
        $path = 'test.yml';
        $configuration = new Configuration('', '');

        $test = new Test($path, $configuration);

        $this->assertSame($path, $test->getPath());
        $this->assertSame($configuration, $test->getConfiguration());
        $this->assertEquals(new Imports(), $test->getImports());
    }

    public function testWithImports()
    {
        $test = new Test('test.yml', new Configuration('', ''));
        $this->assertEquals(new Imports(), $test->getImports());

        $nonEmptyImports = (new Imports())
            ->withStepPaths([
                'step_import_name' => '../step.yml',
            ]);

        $test = $test->withImports($nonEmptyImports);
        $this->assertEquals($nonEmptyImports, $test->getImports());
    }
}
