<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit\Test;

use webignition\BasilDataStructure\Action\WaitAction;
use webignition\BasilDataStructure\Assertion;
use webignition\BasilDataStructure\Step;
use webignition\BasilDataStructure\Test\Configuration;
use webignition\BasilDataStructure\Test\Imports;
use webignition\BasilDataStructure\Test\Test;

class TestTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider createDataProvider
     */
    public function testCreate(string $path, Configuration $configuration, array $steps, array $expectedSteps)
    {
        $test = new Test($path, $configuration, $steps);

        $this->assertSame($path, $test->getPath());
        $this->assertSame($configuration, $test->getConfiguration());
        $this->assertEquals($expectedSteps, $test->getSteps());
        $this->assertEquals(new Imports(), $test->getImports());
    }

    public function createDataProvider(): array
    {
        return [
            'empty' => [
                'path' => 'test.yml',
                'configuration' => new Configuration('', ''),
                'steps' => [],
                'expectedSteps' => [],
            ],
            'valid and invalid steps' => [
                'path' => 'test.yml',
                'configuration' => new Configuration('', ''),
                'steps' => [
                    1,
                    'string',
                    true,
                    new Step(
                        [
                            new WaitAction('wait 1', '1'),
                        ],
                        [
                            new Assertion('".selector" exists', '".selector"', 'exists'),
                        ]
                    ),
                    'step name' => new Step(
                        [
                            new WaitAction('wait 1', '1'),
                        ],
                        [
                            new Assertion('".selector" exists', '".selector"', 'exists'),
                        ]
                    ),
                ],
                'expectedSteps' => [
                    '3' => new Step(
                        [
                            new WaitAction('wait 1', '1'),
                        ],
                        [
                            new Assertion('".selector" exists', '".selector"', 'exists'),
                        ]
                    ),
                    'step name' => new Step(
                        [
                            new WaitAction('wait 1', '1'),
                        ],
                        [
                            new Assertion('".selector" exists', '".selector"', 'exists'),
                        ]
                    ),
                ],
            ],
        ];
    }

    public function testWithImports()
    {
        $test = new Test('test.yml', new Configuration('', ''), []);
        $this->assertEquals(new Imports(), $test->getImports());

        $nonEmptyImports = (new Imports())
            ->withStepPaths([
                'step_import_name' => '../step.yml',
            ]);

        $test = $test->withImports($nonEmptyImports);
        $this->assertEquals($nonEmptyImports, $test->getImports());
    }
}
