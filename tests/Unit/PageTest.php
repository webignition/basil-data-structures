<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Tests\Unit;

use webignition\BasilDataStructure\Page;

class PageTest extends \PHPUnit\Framework\TestCase
{
    public function testCreate()
    {
        $emptyPage = new Page('', []);
        $this->assertSame('', $emptyPage->getUrl());
        $this->assertSame([], $emptyPage->getElements());

        $nonEmptyPage = new Page('http://example.com', ['title' => '.title']);

        $this->assertSame('http://example.com', $nonEmptyPage->getUrl());
        $this->assertSame(['title' => '.title'], $nonEmptyPage->getElements());
    }
}
