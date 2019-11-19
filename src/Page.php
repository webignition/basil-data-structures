<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure;

class Page extends AbstractDataStructure
{
    const KEY_URL = 'url';
    const KEY_ELEMENTS = 'elements';

    public function getUrl(): string
    {
        return $this->getString(self::KEY_URL);
    }

    public function getElements(): array
    {
        return $this->getArray(self::KEY_ELEMENTS);
    }
}
