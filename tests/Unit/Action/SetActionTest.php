<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit\Action;

use webignition\BasilDataStructure\Action\SetAction;

class SetActionTest extends \PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $source = 'set ".selector" to "value"';
        $arguments = '".selector" to "value"';
        $identifier = '.selector';
        $value = 'value';

        $action = new SetAction($source, $arguments, $identifier, $value);

        $this->assertSame($source, $action->getSource());
        $this->assertSame(SetAction::TYPE, $action->getType());
        $this->assertSame($arguments, $action->getArguments());
        $this->assertSame($identifier, $action->getIdentifier());
        $this->assertSame($value, $action->getValue());
    }
}
