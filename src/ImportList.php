<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure;

class ImportList extends AbstractDataStructure
{
    private $basePath = '';
    private $pathResolver;

    public function __construct(PathResolver $pathResolver, string $basePath, array $data)
    {
        parent::__construct($this->normalizePaths($data));

        $this->pathResolver = $pathResolver;
        $this->basePath = $basePath;
    }

    public function getPaths(): array
    {
        return $this->resolvePaths($this->data);
    }

    private function resolvePaths(array $paths): array
    {
        foreach ($paths as $pathIndex => $path) {
            $paths[$pathIndex] = $this->pathResolver->resolve($this->basePath, $path);
        }

        return $paths;
    }

    private function normalizePaths(array $paths): array
    {
        foreach ($paths as $pathIndex => $path) {
            $paths[$pathIndex] = (string) $path;
        }

        return $paths;
    }
}
