<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit\Test;

use webignition\BasilDataStructure\PathResolver;
use webignition\BasilDataStructure\Test\Imports;

class ImportsTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var PathResolver
     */
    private $pathResolver;

    protected function setUp(): void
    {
        parent::setUp();

        $this->pathResolver = PathResolver::create();
    }

    public function testEmptyImports()
    {
        $importsDataStructure = new Imports($this->pathResolver, '', []);

        $this->assertSame([], $importsDataStructure->getStepPaths());
        $this->assertSame([], $importsDataStructure->getPagePaths());
        $this->assertSame([], $importsDataStructure->getDataProviderPaths());
    }

    /**
     * @dataProvider pathsDataProvider
     */
    public function testGetStepPaths($paths, string $basePath, array $expectedPaths)
    {
        $importsDataStructure = new Imports(
            $this->pathResolver,
            $basePath,
            [
                Imports::KEY_STEPS => $paths,
            ]
        );

        $this->assertSame($expectedPaths, $importsDataStructure->getStepPaths());
    }

    /**
     * @dataProvider pathsDataProvider
     */
    public function testGetPagePaths($paths, string $basePath, array $expectedPaths)
    {
        $importsDataStructure = new Imports(
            $this->pathResolver,
            $basePath,
            [
                Imports::KEY_PAGES => $paths,
            ]
        );

        $this->assertSame($expectedPaths, $importsDataStructure->getPagePaths());
    }

    /**
     * @dataProvider pathsDataProvider
     */
    public function testGetDataProviderPaths($paths, string $basePath, array $expectedPaths)
    {
        $importsDataStructure = new Imports(
            $this->pathResolver,
            $basePath,
            [
                Imports::KEY_DATA_PROVIDERS => $paths,
            ]
        );

        $this->assertSame($expectedPaths, $importsDataStructure->getDataProviderPaths());
    }

    public function pathsDataProvider(): array
    {
        return [
            'not an array' => [
                'paths' => 'not an array',
                'basePath' => '',
                'expectedPaths' => [],
            ],
            'empty' => [
                'paths' => [],
                'basePath' => '',
                'expectedPaths' => [],
            ],
            'relative import path, no base path' => [
                'paths' => [
                    'foo' => '../Relative/foo.yml',
                ],
                'basePath' => '',
                'expectedPaths' => [
                    'foo' => '../Relative/foo.yml',
                ],
            ],
            'relative import path, has base path; previous directory' => [
                'paths' => [
                    'foo' => '../Relative/foo.yml',
                ],
                'basePath' => '/basil/Test/',
                'expectedPaths' => [
                    'foo' => '/basil/Relative/foo.yml',
                ],
            ],
            'relative import path, has base path; current directory' => [
                'paths' => [
                    'foo' => './Relative/foo.yml',
                ],
                'basePath' => '/basil/Test/',
                'expectedPaths' => [
                    'foo' => '/basil/Test/Relative/foo.yml',
                ],
            ],
            'absolute import path, no base path' => [
                'paths' => [
                    'foo' => './Relative/foo.yml',
                ],
                'basePath' => '/basil/Test/',
                'expectedPaths' => [
                    'foo' => '/basil/Test/Relative/foo.yml',
                ],
            ],
        ];
    }
}
