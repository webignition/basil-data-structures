<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure;

class DataSet
{
    private $name;
    private $data = [];

    public function __construct(string $name, array $data)
    {
        $this->name = $name;

        foreach ($data as $key => $value) {
            $this->data[$key] = (string) $value;
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return string[]
     */
    public function getParameterNames(): array
    {
        $keys = [];

        foreach (array_keys($this->data) as $key) {
            $keys[] = (string) $key;
        }

        asort($keys);

        return array_values($keys);
    }

    public function hasParameterNames(array $parameterNames): bool
    {
        $dataSetParameterNames = $this->getParameterNames();

        foreach ($parameterNames as $parameterName) {
            if (!in_array($parameterName, $dataSetParameterNames)) {
                return false;
            }
        }

        return true;
    }
}
