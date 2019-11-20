<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit\Action;

use webignition\BasilDataStructure\Action\SubmitAction;

class SubmitActionTest extends \PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $arguments = '".selector"';
        $identifier = '.selector';

        $action = new SubmitAction($arguments, $identifier);

        $this->assertSame(SubmitAction::TYPE, $action->getType());
        $this->assertSame($arguments, $action->getArguments());
        $this->assertSame($identifier, $action->getIdentifier());
    }
}
