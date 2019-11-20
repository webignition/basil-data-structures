<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit\Action;

use webignition\BasilDataStructure\Action\ClickAction;

class ClickActionTest extends \PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $arguments = '".selector"';
        $identifier = '.selector';

        $action = new ClickAction($arguments, $identifier);

        $this->assertSame(ClickAction::TYPE, $action->getType());
        $this->assertSame($arguments, $action->getArguments());
        $this->assertSame($identifier, $action->getIdentifier());
    }
}
