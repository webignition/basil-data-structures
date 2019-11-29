<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure;

class DataSetCollection implements \Countable, \Iterator
{
    /**
     * @var DataSet[]
     */
    private $dataSets = [];

    private $iteratorPosition = 0;

    public function __construct(array $data)
    {
        $this->iteratorPosition = 0;

        foreach ($data as $dataSetName => $dataSet) {
            if (is_array($dataSet)) {
                $this->dataSets[] = new DataSet((string) $dataSetName, $dataSet);
            }
        }
    }

    /**
     * @return string[]
     */
    public function getParameterNames(): array
    {
        $firstDataSet = $this->dataSets[0] ?? null;

        if (null === $firstDataSet) {
            return [];
        }

        return $firstDataSet->getParameterNames();
    }

    // \Countable methods

    public function count(): int
    {
        return count($this->dataSets);
    }

    // Iterator methods

    public function rewind()
    {
        $this->iteratorPosition = 0;
    }

    public function current(): ?DataSet
    {
        return $this->dataSets[$this->iteratorPosition] ?? null;
    }

    public function key(): int
    {
        return $this->iteratorPosition;
    }

    public function next()
    {
        ++$this->iteratorPosition;
    }

    public function valid(): bool
    {
        return isset($this->dataSets[$this->iteratorPosition]);
    }
}
