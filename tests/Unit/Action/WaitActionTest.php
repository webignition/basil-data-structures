<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit\Action;

use webignition\BasilDataStructure\Action\WaitAction;

class WaitActionTest extends \PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $source = 'wait 30';
        $duration = '30';

        $action = new WaitAction($source, $duration);

        $this->assertSame($source, $action->getSource());
        $this->assertSame(WaitAction::TYPE, $action->getType());
        $this->assertSame($duration, $action->getArguments());
        $this->assertSame($duration, $action->getDuration());
    }
}
