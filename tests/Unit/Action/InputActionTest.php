<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit\Action;

use webignition\BasilDataStructure\Action\InputAction;

class InputActionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider createDataProvider
     */
    public function testCreate(string $source, string $arguments, string $identifier, ?string $value)
    {
        $action = new InputAction($source, $arguments, $identifier, $value);

        $this->assertSame($source, $action->getSource());
        $this->assertSame(InputAction::TYPE, $action->getType());
        $this->assertSame($arguments, $action->getArguments());
        $this->assertSame($identifier, $action->getIdentifier());
        $this->assertSame($value, $action->getValue());
    }

    public function createDataProvider(): array
    {
        return [
            'has value' => [
                'source' => 'set ".selector" to "value"',
                'arguments' => '".selector" to "value"',
                'identifier' => '".selector"',
                'value' => '"value"',
            ],
            'missing value' => [
                'source' => 'set ".selector" to',
                'arguments' => '".selector" to',
                'identifier' => '".selector"',
                'value' => null,
            ],
        ];
    }
}
