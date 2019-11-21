<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Test;

class Imports
{
    private $stepPaths = [];
    private $pagePaths = [];
    private $dataProviderPaths = [];

    public function getStepPaths(): array
    {
        return $this->stepPaths;
    }

    public function getPagePaths(): array
    {
        return $this->pagePaths;
    }

    public function getDataProviderPaths(): array
    {
        return $this->dataProviderPaths;
    }

    public function withStepPaths(array $paths): Imports
    {
        $new = clone $this;
        $new->stepPaths = $this->filterPaths($paths);

        return $new;
    }

    public function withPagePaths(array $paths): Imports
    {
        $new = clone $this;
        $new->pagePaths = $this->filterPaths($paths);

        return $new;
    }

    public function withDataProviderPaths(array $paths): Imports
    {
        $new = clone $this;
        $new->dataProviderPaths = $this->filterPaths($paths);

        return $new;
    }

    private function filterPaths(array $paths): array
    {
        return array_filter($paths, function ($path) {
            return is_string($path) && '' !== trim($path);
        });
    }
}
