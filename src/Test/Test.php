<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Test;

use webignition\BasilDataStructure\AbstractDataStructure;
use webignition\BasilDataStructure\PathResolver;
use webignition\BasilDataStructure\Step;

class Test extends AbstractDataStructure
{
    public const KEY_CONFIGURATION = 'config';
    public const KEY_IMPORTS = 'imports';

    private $path = '';
    private $pathResolver;

    public function __construct(PathResolver $pathResolver, array $data, string $path = '')
    {
        parent::__construct($data);

        $this->path = $path;
        $this->pathResolver = $pathResolver;
    }

    public function getConfiguration(): Configuration
    {
        return new Configuration($this->data[self::KEY_CONFIGURATION] ?? []);
    }

    public function getImports(): Imports
    {
        $basePath = dirname($this->path) . DIRECTORY_SEPARATOR;

        return new Imports($this->pathResolver, $basePath, $this->data[self::KEY_IMPORTS] ?? []);
    }

    public function getSteps(): array
    {
        $stepNames = array_diff(array_keys($this->data), [self::KEY_CONFIGURATION, self::KEY_IMPORTS]);

        $steps = [];

        foreach ($stepNames as $stepName) {
            $steps[$stepName] = new Step($this->data[$stepName]);
        }

        return $steps;
    }

    public function getPath(): string
    {
        return $this->path;
    }
}
