<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Test;

class Test
{
    private $path = '';
    private $configuration;
    private $imports;

    public function __construct(string $path, Configuration $configuration, Imports $imports)
    {
        $this->path = $path;
        $this->configuration = $configuration;
        $this->imports = $imports;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getConfiguration(): Configuration
    {
        return $this->configuration;
    }

    public function getImports(): Imports
    {
        return $this->imports;
    }
}
