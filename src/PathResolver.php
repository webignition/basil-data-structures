<?php

declare(strict_types=1);

namespace webignition\BasilDataStructure;

class PathResolver
{
    private const CURRENT_DIRECTORY = '.';
    private const PREVIOUS_DIRECTORY = '..';

    public static function create(): PathResolver
    {
        return new PathResolver();
    }

    public function resolve(string $basePath, string $path): string
    {
        if (empty($basePath)) {
            return $path;
        }

        if (empty($path)) {
            return $path;
        }

        if (!$this->isRelativePath($path)) {
            return $path;
        }

        return $this->resolveRelativePath($basePath . $path);
    }

    private function isRelativePath(string $path): bool
    {
        $parts = explode(DIRECTORY_SEPARATOR, $path);

        return count($parts) > 0 && (self::CURRENT_DIRECTORY === $parts[0] || self::PREVIOUS_DIRECTORY === $parts[0]);
    }

    private function resolveRelativePath(string $path): string
    {
        $resolvedPathParts = [];
        $parts = explode(DIRECTORY_SEPARATOR, $path);

        foreach ($parts as $part) {
            $part = trim($part);

            if ('' === $part || self::CURRENT_DIRECTORY === $part) {
                continue;
            }

            if (self::PREVIOUS_DIRECTORY !== $part) {
                array_push($resolvedPathParts, $part);
            } elseif (count($resolvedPathParts) > 0) {
                array_pop($resolvedPathParts);
            }
        }

        return DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $resolvedPathParts);
    }
}
