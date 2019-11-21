<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Test;

use webignition\BasilDataStructure\Step;

class Test
{
    private $path = '';
    private $configuration;
    private $imports;
    private $steps = [];

    public function __construct(string $path, Configuration $configuration, array $steps)
    {
        $this->path = $path;
        $this->configuration = $configuration;
        $this->imports = new Imports();

        foreach ($steps as $step) {
            if ($step instanceof Step) {
                $this->steps[] = $step;
            }
        }
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

    /**
     * @return Step[]
     */
    public function getSteps(): array
    {
        return $this->steps;
    }
}
