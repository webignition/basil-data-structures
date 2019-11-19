<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit;

use webignition\BasilDataStructure\Page;

class PageTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider getUrlDataProvider
     */
    public function testGetUrl(Page $pageDataStructure, string $expectedUrlString)
    {
        $this->assertSame($expectedUrlString, $pageDataStructure->getUrl());
    }

    public function getUrlDataProvider(): array
    {
        return [
            'not present' => [
                'pageDataStructure' => new Page([]),
                'expectedUrlString' => '',
            ],
            'scalar; integer' => [
                'pageDataStructure' => new Page([
                    Page::KEY_URL => 100,
                ]),
                'expectedUrlString' => '100',
            ],
            'scalar; float' => [
                'pageDataStructure' => new Page([
                    Page::KEY_URL => 3.14,
                ]),
                'expectedUrlString' => '3.14',
            ],
            'scalar; string' => [
                'pageDataStructure' => new Page([
                    Page::KEY_URL => 'http://example.com/',
                ]),
                'expectedUrlString' => 'http://example.com/',
            ],
            'scalar; bool, true' => [
                'pageDataStructure' => new Page([
                    Page::KEY_URL => true,
                ]),
                'expectedUrlString' => '1',
            ],
            'scalar; bool, false' => [
                'pageDataStructure' => new Page([
                    Page::KEY_URL => false,
                ]),
                'expectedUrlString' => '',
            ],
        ];
    }

    /**
     * @dataProvider getElementsDataProvider
     */
    public function testGetElements(Page $pageDataStructure, array $expectedElementData)
    {
        $this->assertSame($expectedElementData, $pageDataStructure->getElements());
    }

    public function getElementsDataProvider(): array
    {
        return [
            'not present' => [
                'pageDataStructure' => new Page([]),
                'expectedElementData' => [],
            ],
            'not an array' => [
                'pageDataStructure' => new Page([
                    Page::KEY_ELEMENTS => 'string',
                ]),
                'expectedElementData' => [],
            ],
            'empty array' => [
                'pageDataStructure' => new Page([
                    Page::KEY_ELEMENTS => [],
                ]),
                'expectedElementData' => [],
            ],
            'non-empty array' => [
                'pageDataStructure' => new Page([
                    Page::KEY_ELEMENTS => [
                        'title' => '.title',
                    ],
                ]),
                'expectedElementData' => [
                    'title' => '.title',
                ],
            ],
        ];
    }
}
