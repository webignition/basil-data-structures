<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit\Action;

use webignition\BasilDataStructure\Action\WaitAction;

class WaitActionTest extends \PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $duration = '30';

        $action = new WaitAction($duration);

        $this->assertSame(WaitAction::TYPE, $action->getType());
        $this->assertSame($duration, $action->getArguments());
        $this->assertSame($duration, $action->getDuration());
    }
}
