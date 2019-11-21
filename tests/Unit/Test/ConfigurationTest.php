<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit\Test;

use webignition\BasilDataStructure\Test\Configuration;

class ConfigurationTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider getBrowserDataProvider
     */
    public function testGetBrowser(Configuration $configurationDataStructure, string $expectedBrowser)
    {
        $this->assertSame($expectedBrowser, $configurationDataStructure->getBrowser());
    }

    public function getBrowserDataProvider(): array
    {
        return [
            'empty' => [
                'configurationDataStructure' => new Configuration('', ''),
                'expectedBrowser' => '',
            ],
            'non-empty' => [
                'configurationDataStructure' => new Configuration('chrome', ''),
                'expectedBrowser' => 'chrome',
            ],
        ];
    }

    /**
     * @dataProvider getUrlDataProvider
     */
    public function testGetUrl(Configuration $configurationDataStructure, string $expectedUrl)
    {
        $this->assertSame($expectedUrl, $configurationDataStructure->getUrl());
    }

    public function getUrlDataProvider(): array
    {
        return [
            'empty' => [
                'configurationDataStructure' => new Configuration('', ''),
                'expectedUrl' => '',
            ],
            'non-empty' => [
                'configurationDataStructure' => new Configuration('', 'http://example.com/'),
                'expectedUrl' => 'http://example.com/',
            ],
        ];
    }
}
