<?php

namespace webignition\BasilDataStructure\Tests\Unit;

use webignition\BasilDataStructure\Step;

class StepTest extends \PHPUnit\Framework\TestCase
{
    public function testCreate()
    {
        $step = new Step([]);

        $this->assertInstanceOf(Step::class, $step);
    }

    /**
     * @dataProvider getActionsDataProvider
     */
    public function testGetActions(Step $stepDataStructure, array $expectedActionStrings)
    {
        $this->assertSame($expectedActionStrings, $stepDataStructure->getActions());
    }

    public function getActionsDataProvider(): array
    {
        return [
            'not present' => [
                'stepDataStructure' => new Step([]),
                'expectedActionStrings' => [],
            ],
            'not an array' => [
                'stepDataStructure' => new Step([
                    Step::KEY_ACTIONS => 'actions',
                ]),
                'expectedActionStrings' => [],
            ],
            'empty' => [
                'stepDataStructure' => new Step([
                    Step::KEY_ACTIONS => [],
                ]),
                'expectedActionStrings' => [],
            ],
            'empty and non-string actions are ignored' => [
                'stepDataStructure' => new Step([
                    Step::KEY_ACTIONS => [
                        0,
                        '',
                        true,
                        'click ".selector"',
                        '  ',
                        'set ".input" to "value"',
                        "\t",
                    ],
                ]),
                'expectedActionStrings' => [
                    'click ".selector"',
                    'set ".input" to "value"',
                ],
            ],
        ];
    }

    /**
     * @dataProvider getAssertionsDataProvider
     */
    public function testGetAssertions(Step $stepDataStructure, array $expectedAssertionStrings)
    {
        $this->assertSame($expectedAssertionStrings, $stepDataStructure->getAssertions());
    }

    public function getAssertionsDataProvider(): array
    {
        return [
            'not present' => [
                'stepDataStructure' => new Step([]),
                'expectedAssertionStrings' => [],
            ],
            'not an array' => [
                'stepDataStructure' => new Step([
                    Step::KEY_ASSERTIONS => 'actions',
                ]),
                'expectedAssertionStrings' => [],
            ],
            'empty' => [
                'stepDataStructure' => new Step([
                    Step::KEY_ASSERTIONS => [],
                ]),
                'expectedAssertionStrings' => [],
            ],
            'empty assertions are ignored' => [
                'stepDataStructure' => new Step([
                    Step::KEY_ASSERTIONS => [
                        '',
                        0,
                        true,
                        '".selector" exists',
                        ' ',
                        "\t",
                    ],
                ]),
                'expectedAssertionStrings' => [
                    '".selector" exists',
                ],
            ],
        ];
    }

    /**
     * @dataProvider getImportNameDataProvider
     */
    public function testGetImportName(Step $stepDataStructure, string $expectedImportName)
    {
        $this->assertSame($expectedImportName, $stepDataStructure->getImportName());
    }

    public function getImportNameDataProvider(): array
    {
        return [
            'not present' => [
                'stepDataStructure' => new Step([]),
                'expectedImportName' => '',
            ],
            'not a string' => [
                'stepDataStructure' => new Step([
                    Step::KEY_USE => 123,
                ]),
                'expectedImportName' => '123',
            ],
            'is a string' => [
                'stepDataStructure' => new Step([
                    Step::KEY_USE => 'step_import_name',
                ]),
                'expectedImportName' => 'step_import_name',
            ],
        ];
    }

    /**
     * @dataProvider getDataArrayDataProvider
     */
    public function testGetDataArray(Step $stepDataStructure, array $expectedDataArray)
    {
        $this->assertSame($expectedDataArray, $stepDataStructure->getDataArray());
    }

    public function getDataArrayDataProvider(): array
    {
        return [
            'not present' => [
                'stepDataStructure' => new Step([]),
                'expectedDataArray' => [],
            ],
            'not an array' => [
                'stepDataStructure' => new Step([
                    Step::KEY_DATA => 'data_provider_import_name',
                ]),
                'expectedDataArray' => [],
            ],
            'is an array' => [
                'stepDataStructure' => new Step([
                    Step::KEY_DATA => [
                        'set1' => [
                            'key' => 'value',
                        ],
                    ],
                ]),
                'expectedDataArray' => [
                    'set1' => [
                        'key' => 'value',
                    ],
                ],
            ],
        ];
    }

    /**
     * @dataProvider getDataImportNameDataProvider
     */
    public function testGetDataImportName(Step $stepDataStructure, string $expectedDataImportName)
    {
        $this->assertSame($expectedDataImportName, $stepDataStructure->getDataImportName());
    }

    public function getDataImportNameDataProvider(): array
    {
        return [
            'not present' => [
                'stepDataStructure' => new Step([]),
                'expectedDataImportName' => '',
            ],
            'not a string' => [
                'stepDataStructure' => new Step([
                    Step::KEY_DATA => [
                        'set1' => [
                            'key' => 'value',
                        ],
                    ],
                ]),
                'expectedDataImportName' => '',
            ],
            'is a string' => [
                'stepDataStructure' => new Step([
                    Step::KEY_DATA => 'data_provider_import_name',
                ]),
                'expectedDataImportName' => 'data_provider_import_name',
            ],
        ];
    }

    /**
     * @dataProvider getElementsDataProvider
     */
    public function testGetElements(Step $stepDataStructure, array $expectedElementStrings)
    {
        $this->assertSame($expectedElementStrings, $stepDataStructure->getElements());
    }

    public function getElementsDataProvider(): array
    {
        return [
            'not present' => [
                'stepDataStructure' => new Step([]),
                'expectedElementStrings' => [],
            ],
            'not an array' => [
                'stepDataStructure' => new Step([
                    Step::KEY_ELEMENTS => 'elements',
                ]),
                'expectedElementStrings' => [],
            ],
            'is an array' => [
                'stepDataStructure' => new Step([
                    Step::KEY_ELEMENTS => [
                        'heading' => 'page_import_name.elements.heading',
                    ],
                ]),
                'expectedElementStrings' => [
                    'heading' => 'page_import_name.elements.heading',
                ],
            ],
        ];
    }
}
