<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit\Action;

use webignition\BasilDataStructure\Action\ClickAction;

class ClickActionTest extends \PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $source = 'click ".selector"';
        $arguments = '".selector"';
        $identifier = '.selector';

        $action = new ClickAction($source, $arguments, $identifier);

        $this->assertSame($source, $action->getSource());
        $this->assertSame(ClickAction::TYPE, $action->getType());
        $this->assertSame($arguments, $action->getArguments());
        $this->assertSame($identifier, $action->getIdentifier());
    }
}
