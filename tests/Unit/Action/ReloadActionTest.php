<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit\Action;

use webignition\BasilDataStructure\Action\ReloadAction;

class ReloadActionTest extends \PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $sourceWithoutArguments = 'reload';
        $actionWithoutArguments = new ReloadAction($sourceWithoutArguments);

        $this->assertSame($sourceWithoutArguments, $actionWithoutArguments->getSource());
        $this->assertSame(ReloadAction::TYPE, $actionWithoutArguments->getType());
        $this->assertSame(null, $actionWithoutArguments->getArguments());

        $sourceWithArguments = 'reload arguments';
        $arguments = 'arguments';
        $actionWithArguments = new ReloadAction($sourceWithArguments, $arguments);

        $this->assertSame($sourceWithArguments, $actionWithArguments->getSource());
        $this->assertSame(ReloadAction::TYPE, $actionWithArguments->getType());
        $this->assertSame($arguments, $actionWithArguments->getArguments());
    }
}
