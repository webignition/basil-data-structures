<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit\Action;

use webignition\BasilDataStructure\Action\WaitForAction;

class WaitForActionTest extends \PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $arguments = '".selector"';
        $identifier = '.selector';

        $action = new WaitForAction($arguments, $identifier);

        $this->assertSame(WaitForAction::TYPE, $action->getType());
        $this->assertSame($arguments, $action->getArguments());
        $this->assertSame($identifier, $action->getIdentifier());
    }
}
