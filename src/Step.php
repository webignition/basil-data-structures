<?php

namespace webignition\BasilDataStructure;

class Step extends AbstractDataStructure
{
    const KEY_ACTIONS = 'actions';
    const KEY_ASSERTIONS = 'assertions';
    const KEY_USE = 'use';
    const KEY_DATA = 'data';
    const KEY_ELEMENTS = 'elements';

    public function getActions(): array
    {
        return $this->getNonEmptyStrings(self::KEY_ACTIONS);
    }

    public function getAssertions(): array
    {
        return $this->getNonEmptyStrings(self::KEY_ASSERTIONS);
    }

    public function getImportName(): string
    {
        return $this->getString(self::KEY_USE);
    }

    public function getDataArray(): array
    {
        return $this->getArray(self::KEY_DATA);
    }

    public function getDataImportName(): string
    {
        return $this->getString(self::KEY_DATA);
    }

    public function getElements(): array
    {
        return $this->getArray(self::KEY_ELEMENTS);
    }

    private function getNonEmptyStrings(string $key): array
    {
        return array_values(
            array_filter($this->getArray($key), function ($value) {
                return is_string($value) && trim($value) !== '';
            })
        );
    }
}
