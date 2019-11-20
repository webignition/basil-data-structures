<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit\Action;

use webignition\BasilDataStructure\Action\BackAction;

class BackActionTest extends \PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $actionWithoutArguments = new BackAction();

        $this->assertSame(BackAction::TYPE, $actionWithoutArguments->getType());
        $this->assertSame(null, $actionWithoutArguments->getArguments());

        $arguments = 'arguments';
        $actionWithArguments = new BackAction($arguments);

        $this->assertSame(BackAction::TYPE, $actionWithArguments->getType());
        $this->assertSame($arguments, $actionWithArguments->getArguments());
    }
}
