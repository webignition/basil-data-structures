<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit\Action;

use webignition\BasilDataStructure\Action\SubmitAction;

class SubmitActionTest extends \PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $source = 'submit ".selector"';
        $arguments = '".selector"';
        $identifier = '.selector';

        $action = new SubmitAction($source, $arguments, $identifier);

        $this->assertSame($source, $action->getSource());
        $this->assertSame(SubmitAction::TYPE, $action->getType());
        $this->assertSame($arguments, $action->getArguments());
        $this->assertSame($identifier, $action->getIdentifier());
    }
}
