<?php
/** @noinspection PhpDocSignatureInspection */

namespace webignition\BasilDataStructure\Tests\Unit\Test;

use webignition\BasilDataStructure\PathResolver;
use webignition\BasilDataStructure\Step;
use webignition\BasilDataStructure\Test\Configuration;
use webignition\BasilDataStructure\Test\Imports;
use webignition\BasilDataStructure\Test\Test;

class TestTest extends \PHPUnit\Framework\TestCase
{
    public function testGetConfiguration()
    {
        $testDataStructure = new Test(PathResolver::create(), []);

        $this->assertInstanceOf(Configuration::class, $testDataStructure->getConfiguration());
    }

    public function testGetImports()
    {
        $testDataStructure = new Test(PathResolver::create(), []);

        $this->assertInstanceOf(Imports::class, $testDataStructure->getImports());
    }

    /**
     * @dataProvider getStepsDataProvider
     */
    public function testGetSteps(Test $testDataStructure, array $expectedSteps)
    {
        $this->assertEquals($expectedSteps, $testDataStructure->getSteps());
    }

    public function getStepsDataProvider(): array
    {
        return [
            'empty' => [
                'testDataStructure' => new Test(PathResolver::create(), []),
                'expectedSteps' => [],
            ],
            'configuration and imports are excluded' => [
                'testDataStructure' => new Test(
                    PathResolver::create(),
                    [
                        Test::KEY_CONFIGURATION => [
                            Configuration::KEY_URL => 'http://example.com',
                            Configuration::KEY_BROWSER => 'chrome',
                        ],
                        Test::KEY_IMPORTS => [
                            Imports::KEY_STEPS => [],
                            Imports::KEY_PAGES => [],
                            Imports::KEY_DATA_PROVIDERS => [],
                        ],
                        'step 1' => [
                            Step::KEY_ACTIONS => [
                                'click ".foo"',
                            ],
                            Step::KEY_ASSERTIONS => [
                                '".foo" exists',
                            ],
                        ],
                    ]
                ),
                'expectedSteps' => [
                    'step 1' => new Step([
                        Step::KEY_ACTIONS => [
                            'click ".foo"',
                        ],
                        Step::KEY_ASSERTIONS => [
                            '".foo" exists',
                        ],
                    ]),
                ],
            ],
        ];
    }

    public function testGetPath()
    {
        $path = 'path content';

        $testDataStructure = new Test(PathResolver::create(), [], $path);

        $this->assertSame($path, $testDataStructure->getPath());
    }
}
