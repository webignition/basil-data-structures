<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit\Action;

use webignition\BasilDataStructure\Action\ForwardAction;

class ForwardActionTest extends \PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $sourceWithoutArguments = 'forward';
        $actionWithoutArguments = new ForwardAction($sourceWithoutArguments);

        $this->assertSame($sourceWithoutArguments, $actionWithoutArguments->getSource());
        $this->assertSame(ForwardAction::TYPE, $actionWithoutArguments->getType());
        $this->assertSame(null, $actionWithoutArguments->getArguments());

        $sourceWithArguments = 'forward arguments';
        $arguments = 'arguments';
        $actionWithArguments = new ForwardAction($sourceWithArguments, $arguments);

        $this->assertSame($sourceWithArguments, $actionWithArguments->getSource());
        $this->assertSame(ForwardAction::TYPE, $actionWithArguments->getType());
        $this->assertSame($arguments, $actionWithArguments->getArguments());
    }
}
