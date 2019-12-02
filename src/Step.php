<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure;

use webignition\BasilDataStructure\Action\ActionInterface;
use webignition\BasilDataStructure\Assertion\AssertionInterface;

class Step
{
    private $actions = [];
    private $assertions = [];
    private $importName = '';
    private $dataImportName = '';
    private $data;
    private $elements = [];

    public function __construct(array $actions, array $assertions)
    {
        foreach ($actions as $action) {
            if ($action instanceof ActionInterface) {
                $this->actions[] = $action;
            }
        }

        foreach ($assertions as $assertion) {
            if ($assertion instanceof AssertionInterface) {
                $this->assertions[] = $assertion;
            }
        }

        $this->data = new DataSetCollection([]);
    }

    /**
     * @return ActionInterface[]
     */
    public function getActions(): array
    {
        return $this->actions;
    }

    /**
     * @return AssertionInterface[]
     */
    public function getAssertions(): array
    {
        return $this->assertions;
    }

    public function getImportName(): string
    {
        return $this->importName;
    }

    public function withImportName(string $importName): Step
    {
        $new = clone $this;
        $new->importName = $importName;

        return $new;
    }

    public function getDataImportName(): string
    {
        return $this->dataImportName;
    }

    public function withDataImportName(string $dataImportName): Step
    {
        $new = clone $this;
        $new->dataImportName = $dataImportName;

        return $new;
    }

    public function getData(): DataSetCollection
    {
        return $this->data;
    }

    public function withData(DataSetCollection $data): Step
    {
        $new = clone $this;
        $new->data = $data;

        return $new;
    }

    public function getElements(): array
    {
        return $this->elements;
    }

    public function withElements(array $elements): Step
    {
        $new = clone $this;
        $new->elements = $elements;

        return $new;
    }
}
