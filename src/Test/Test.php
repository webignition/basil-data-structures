<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Test;

class Test
{
    private $name = '';
    private $configuration;
    private $imports;

    public function __construct(string $name, Configuration $configuration, Imports $imports)
    {
        $this->name = $name;
        $this->configuration = $configuration;
        $this->imports = $imports;
    }

    public function getName(): string
    {
        return $this->name;
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
