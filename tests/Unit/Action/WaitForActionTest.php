<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit\Action;

use webignition\BasilDataStructure\Action\WaitForAction;

class WaitForActionTest extends \PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $source = 'wait-for ".selector"';
        $arguments = '".selector"';
        $identifier = '.selector';

        $action = new WaitForAction($source, $arguments, $identifier);

        $this->assertSame($source, $action->getSource());
        $this->assertSame(WaitForAction::TYPE, $action->getType());
        $this->assertSame($arguments, $action->getArguments());
        $this->assertSame($identifier, $action->getIdentifier());
    }
}
