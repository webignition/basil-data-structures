<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit\Test;

use webignition\BasilDataStructure\Test\Imports;

class ImportsTest extends \PHPUnit\Framework\TestCase
{
    public function testGetWithStepPaths()
    {
        $imports = new Imports();
        $this->assertSame([], $imports->getStepPaths());

        $paths = [
            'invalid bool' => true,
            'invalid int' => 7,
            'step_name' => '/absolute/path/to/step.yml',
        ];

        $expectedPaths = [
            'step_name' => '/absolute/path/to/step.yml',
        ];

        $imports = $imports->withStepPaths($paths);
        $this->assertSame($expectedPaths, $imports->getStepPaths());
    }

    public function testGetWithPagePaths()
    {
        $imports = new Imports();
        $this->assertSame([], $imports->getPagePaths());

        $paths = [
            'invalid bool' => true,
            'invalid int' => 7,
            'page_name' => '/absolute/path/to/page.yml',
        ];

        $expectedPaths = [
            'page_name' => '/absolute/path/to/page.yml',
        ];

        $imports = $imports->withPagePaths($paths);
        $this->assertSame($expectedPaths, $imports->getPagePaths());
    }

    public function testGetWithDataProviderPaths()
    {
        $imports = new Imports();
        $this->assertSame([], $imports->getDataProviderPaths());

        $paths = [
            'invalid bool' => true,
            'invalid int' => 7,
            'dataProvider_name' => '/absolute/path/to/dataProvider.yml',
        ];

        $expectedPaths = [
            'dataProvider_name' => '/absolute/path/to/dataProvider.yml',
        ];

        $imports = $imports->withDataProviderPaths($paths);
        $this->assertSame($expectedPaths, $imports->getDataProviderPaths());
    }
}
