<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit\Action;

use webignition\BasilDataStructure\Action\Action;

class ActionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider createDataProvider
     */
    public function testCreate(string $source, ?string $type, ?string $arguments)
    {
        $action = new Action($source, $type, $arguments);

        $this->assertEquals($source, $action->getSource());
        $this->assertEquals($type, $action->getType());
        $this->assertEquals($arguments, $action->getArguments());
    }

    public function createDataProvider(): array
    {
        return [
            'empty' => [
                'source' => '',
                'type' => null,
                'arguments' => null,
            ],
            'without arguments' => [
                'source' => 'reload',
                'type' => 'reload',
                'arguments' => null,
            ],
            'with arguments' => [
                'source' => 'click ".selector"',
                'type' => '".selector"',
                'arguments' => '".selector"',
            ],
        ];
    }
}
