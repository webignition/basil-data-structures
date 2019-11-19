<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure\Test;

use webignition\BasilDataStructure\AbstractDataStructure;
use webignition\BasilDataStructure\ImportList;
use webignition\BasilDataStructure\PathResolver;

class Imports extends AbstractDataStructure
{
    public const KEY_STEPS = 'steps';
    public const KEY_PAGES = 'pages';
    public const KEY_DATA_PROVIDERS = 'data_providers';

    private $stepPaths;
    private $pagePaths;
    private $dataProviderPaths;

    public function __construct(PathResolver $pathResolver, string $basePath, array $data)
    {
        parent::__construct($data);

        $this->stepPaths = new ImportList($pathResolver, $basePath, $this->getArray(self::KEY_STEPS));
        $this->pagePaths = new ImportList($pathResolver, $basePath, $this->getArray(self::KEY_PAGES));
        $this->dataProviderPaths = new ImportList($pathResolver, $basePath, $this->getArray(self::KEY_DATA_PROVIDERS));
    }

    public function getStepPaths(): array
    {
        return $this->stepPaths->getPaths();
    }

    public function getPagePaths(): array
    {
        return $this->pagePaths->getPaths();
    }

    public function getDataProviderPaths(): array
    {
        return $this->dataProviderPaths->getPaths();
    }
}
