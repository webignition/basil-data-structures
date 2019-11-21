<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Test;

class Test
{
    private $path = '';
    private $configuration;
    private $imports;

    public function __construct(string $path, Configuration $configuration)
    {
        $this->path = $path;
        $this->configuration = $configuration;
        $this->imports = new Imports();
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getConfiguration(): Configuration
    {
        return $this->configuration;
    }

    public function getImports(): ?Imports
    {
        return $this->imports;
    }

    public function withImports(Imports $imports): Test
    {
        $new = clone $this;
        $new->imports = $imports;

        return $new;
    }
}
