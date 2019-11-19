<?php

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
            'not present' => [
                'configurationDataStructure' => new Configuration([]),
                'expectedBrowser' => '',
            ],
            'scalar; integer' => [
                'configurationDataStructure' => new Configuration([
                    Configuration::KEY_BROWSER => 100,
                ]),
                'expectedBrowser' => '100',
            ],
            'scalar; float' => [
                'configurationDataStructure' => new Configuration([
                    Configuration::KEY_BROWSER => 3.14,
                ]),
                'expectedBrowser' => '3.14',
            ],
            'scalar; string' => [
                'configurationDataStructure' => new Configuration([
                    Configuration::KEY_BROWSER => 'chrome',
                ]),
                'expectedBrowser' => 'chrome',
            ],
            'scalar; bool, true' => [
                'configurationDataStructure' => new Configuration([
                    Configuration::KEY_BROWSER => true,
                ]),
                'expectedBrowser' => '1',
            ],
            'scalar; bool, false' => [
                'configurationDataStructure' => new Configuration([
                    Configuration::KEY_BROWSER => false,
                ]),
                'expectedBrowser' => '',
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
            'not present' => [
                'configurationDataStructure' => new Configuration([]),
                'expectedUrl' => '',
            ],
            'scalar; integer' => [
                'configurationDataStructure' => new Configuration([
                    Configuration::KEY_URL => 100,
                ]),
                'expectedUrl' => '100',
            ],
            'scalar; float' => [
                'configurationDataStructure' => new Configuration([
                    Configuration::KEY_URL => 3.14,
                ]),
                'expectedUrl' => '3.14',
            ],
            'scalar; string' => [
                'configurationDataStructure' => new Configuration([
                    Configuration::KEY_URL => 'http://example.com/',
                ]),
                'expectedUrl' => 'http://example.com/',
            ],
            'scalar; bool, true' => [
                'configurationDataStructure' => new Configuration([
                    Configuration::KEY_URL => true,
                ]),
                'expectedUrl' => '1',
            ],
            'scalar; bool, false' => [
                'configurationDataStructure' => new Configuration([
                    Configuration::KEY_URL => false,
                ]),
                'expectedUrl' => '',
            ],
        ];
    }
}
