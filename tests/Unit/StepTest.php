<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit;

use webignition\BasilDataStructure\Action\InteractionAction;
use webignition\BasilDataStructure\Action\WaitAction;
use webignition\BasilDataStructure\Assertion;
use webignition\BasilDataStructure\Step;

class StepTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider createDataProvider
     */
    public function testCreate(array $actions, array $assertions, array $expectedActions, array $expectedAssertions)
    {
        $step = new Step($actions, $assertions);

        $this->assertEquals($expectedActions, $step->getActions());
        $this->assertEquals($expectedAssertions, $step->getAssertions());
    }

    public function createDataProvider(): array
    {
        return [
            'empty' => [
                'actions' => [],
                'assertions' => [],
                'expectedActions' => [],
                'expectedAssertions' => [],
            ],
            'all invalid' => [
                'actions' => [
                    1,
                    true,
                    'string',
                ],
                'assertions' => [
                    1,
                    true,
                    'string',
                ],
                'expectedActions' => [],
                'expectedAssertions' => [],
            ],
            'all valid' => [
                'actions' => [
                    new WaitAction('wait 1', '1'),
                    new InteractionAction('click ".selector"', 'click', '".selector"', '".selector"'),
                ],
                'assertions' => [
                    new Assertion('$page.title is "Example"', '$page.title', 'is', '"Example"'),
                    new Assertion('".selector" exists', '".selector"', 'exists'),
                ],
                'expectedActions' => [
                    new WaitAction('wait 1', '1'),
                    new InteractionAction('click ".selector"', 'click', '".selector"', '".selector"'),
                ],
                'expectedAssertions' => [
                    new Assertion('$page.title is "Example"', '$page.title', 'is', '"Example"'),
                    new Assertion('".selector" exists', '".selector"', 'exists'),
                ],
            ],
        ];
    }

    public function testGetWithImportName()
    {
        $step = new Step([], []);
        $this->assertSame('', $step->getImportName());

        $step = $step->withImportName('import_name');
        $this->assertSame('import_name', $step->getImportName());
    }

    public function testGetWithDataImportName()
    {
        $step = new Step([], []);
        $this->assertSame('', $step->getDataImportName());

        $step = $step->withDataImportName('data_import_name');
        $this->assertSame('data_import_name', $step->getDataImportName());
    }

    public function testGetWithDataArray()
    {
        $step = new Step([], []);
        $this->assertSame([], $step->getDataArray());

        $data = [
            'set1' => [
                'key' => 'value',
            ],
        ];

        $step = $step->withDataArray($data);
        $this->assertSame($data, $step->getDataArray());
    }

    public function testGetWithElements()
    {
        $step = new Step([], []);
        $this->assertSame([], $step->getElements());

        $elements = [
            'heading' => 'page_import_name.elements.heading',
        ];

        $step = $step->withElements($elements);
        $this->assertSame($elements, $step->getElements());
    }
//
//    /**
//     * @dataProvider getElementsDataProvider
//     */
//    public function testGetElements(Step $stepDataStructure, array $expectedElementStrings)
//    {
//        $this->assertSame($expectedElementStrings, $stepDataStructure->getElements());
//    }
//
//    public function getElementsDataProvider(): array
//    {
//        return [
//            'not present' => [
//                'stepDataStructure' => new Step([]),
//                'expectedElementStrings' => [],
//            ],
//            'not an array' => [
//                'stepDataStructure' => new Step([
//                    Step::KEY_ELEMENTS => 'elements',
//                ]),
//                'expectedElementStrings' => [],
//            ],
//            'is an array' => [
//                'stepDataStructure' => new Step([
//                    Step::KEY_ELEMENTS => [
//                        'heading' => 'page_import_name.elements.heading',
//                    ],
//                ]),
//                'expectedElementStrings' => [
//                    'heading' => 'page_import_name.elements.heading',
//                ],
//            ],
//        ];
//    }
}
