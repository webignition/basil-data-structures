<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit\Action;

use webignition\BasilDataStructure\Action\ReloadAction;

class ReloadActionTest extends \PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $actionWithoutArguments = new ReloadAction();

        $this->assertSame(ReloadAction::TYPE, $actionWithoutArguments->getType());
        $this->assertSame(null, $actionWithoutArguments->getArguments());

        $arguments = 'arguments';
        $actionWithArguments = new ReloadAction($arguments);

        $this->assertSame(ReloadAction::TYPE, $actionWithArguments->getType());
        $this->assertSame($arguments, $actionWithArguments->getArguments());
    }
}
