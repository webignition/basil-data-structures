<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit\Action;

use webignition\BasilDataStructure\Action\BackAction;

class BackActionTest extends \PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $sourceWithoutArguments = 'back';
        $actionWithoutArguments = new BackAction($sourceWithoutArguments);

        $this->assertSame($sourceWithoutArguments, $actionWithoutArguments->getSource());
        $this->assertSame(BackAction::TYPE, $actionWithoutArguments->getType());
        $this->assertSame(null, $actionWithoutArguments->getArguments());

        $sourceWithArguments = 'back arguments';
        $arguments = 'arguments';
        $actionWithArguments = new BackAction($sourceWithArguments, $arguments);

        $this->assertSame($sourceWithArguments, $actionWithArguments->getSource());
        $this->assertSame(BackAction::TYPE, $actionWithArguments->getType());
        $this->assertSame($arguments, $actionWithArguments->getArguments());
    }
}
