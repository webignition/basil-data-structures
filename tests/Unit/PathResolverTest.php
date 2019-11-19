<?php

namespace webignition\BasilDataStructure\Tests\Unit;

use webignition\BasilDataStructure\PathResolver;

class PathResolverTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider resolveDataProvider
     */
    public function testResolve(string $basePath, string $path, string $expectedPath)
    {
        $pathResolver = new PathResolver();

        $this->assertSame($expectedPath, $pathResolver->resolve($basePath, $path));
    }

    public function resolveDataProvider(): array
    {
        return [
            'empty basePath, empty path' => [
                'basePath' => '',
                'path' => '',
                'expectedPath' => '',
            ],
            'empty path' => [
                'basePath' => '/',
                'path' => '',
                'expectedPath' => '',
            ],
            'relative path, no base path' => [
                'basePath' => '',
                'path' => '../Relative/foo.yml',
                'expectedPath' => '../Relative/foo.yml',
            ],
            'relative path, has base path; previous directory' => [
                'basePath' => '/basil/Test/',
                'path' => '../Relative/foo.yml',
                'expectedPath' => '/basil/Relative/foo.yml',
            ],
            'relative path, has base path; current directory' => [
                'basePath' => '/basil/Test/',
                'path' => './Relative/foo.yml',
                'expectedPath' => '/basil/Test/Relative/foo.yml',
            ],
            'absolute import path, no base path' => [
                'basePath' => '/basil/Test/',
                'path' => '/Absolute/foo.yml',
                'expectedPath' => '/Absolute/foo.yml',
            ],
        ];
    }
}
