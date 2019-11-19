<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure;

abstract class AbstractDataStructure
{
    /**
     * @var array
     */
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    protected function getString(string $key): string
    {
        $value = $this->data[$key] ?? '';

        return is_scalar($value) ? (string) $value : '';
    }

    protected function getArray(string $key): array
    {
        $value = $this->data[$key] ?? [];

        return is_array($value) ? $value : [];
    }
}
