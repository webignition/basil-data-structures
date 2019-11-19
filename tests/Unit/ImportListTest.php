<?php

namespace webignition\BasilDataStructure\Tests\Unit;

use webignition\BasilDataStructure\ImportList;
use webignition\BasilDataStructure\PathResolver;

class ImportListTest extends \PHPUnit\Framework\TestCase
{
    public function testEmptyList()
    {
        $importList = new ImportList(PathResolver::create(), '', []);

        $this->assertSame([], $importList->getPaths());
    }

    /**
     * @dataProvider pathsDataProvider
     */
    public function testGetPaths(string $basePath, array $paths, array $expectedPaths)
    {
        $importList = new ImportList(PathResolver::create(), $basePath, $paths);

        $this->assertSame($expectedPaths, $importList->getPaths());
    }

    public function pathsDataProvider(): array
    {
        return [
            'empty' => [
                'basePath' => '',
                'paths' => [],
                'expectedPaths' => [],
            ],
            'relative import path, no base path' => [
                'basePath' => '',
                'paths' => [
                    'foo' => '../Relative/foo.yml',
                ],
                'expectedPaths' => [
                    'foo' => '../Relative/foo.yml',
                ],
            ],
            'relative import path, has base path; previous directory' => [
                'basePath' => '/basil/Test/',
                'paths' => [
                    'foo' => '../Relative/foo.yml',
                ],
                'expectedPaths' => [
                    'foo' => '/basil/Relative/foo.yml',
                ],
            ],
            'relative import path, has base path; current directory' => [
                'basePath' => '/basil/Test/',
                'paths' => [
                    'foo' => './Relative/foo.yml',
                ],
                'expectedPaths' => [
                    'foo' => '/basil/Test/Relative/foo.yml',
                ],
            ],
            'absolute import path, no base path' => [
                'basePath' => '/basil/Test/',
                'paths' => [
                    'foo' => '/Absolute/foo.yml',
                ],
                'expectedPaths' => [
                    'foo' => '/Absolute/foo.yml',
                ],
            ],
            'integer' => [
                'basePath' => '/basil/Test/',
                'paths' => [
                    'foo' => 123,
                ],
                'expectedPaths' => [
                    'foo' => '123',
                ],
            ],
        ];
    }
}
