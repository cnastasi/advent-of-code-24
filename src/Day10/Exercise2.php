<?php

namespace DevDojo\Day10;

use DevDojo\Day10\Support\Coordinates;
use DevDojo\Day10\Support\Direction;
use DevDojo\Day10\Support\Map;
use DevDojo\Day10\Support\Path;
use DevDojo\Day10\Support\Paths;
use DevDojo\Day10\Support\Tails;

class Exercise2
{
    public static function execute(string $input): int
    {
        $map = Map::fromString($input);

        $trailingHeads = $map->findTrailingHeads();

        $sum = 0;
        foreach ($trailingHeads as $head) {
            $paths = new Paths();

            static::findPaths($head, $map, 0, $paths, new Path($head));

            $sum += $paths->count;
        }

        return $sum;
    }

    private static function findPaths(Coordinates $point, Map $map, int $height, Paths $paths, Path $previousPath): void
    {
        if (!$map->canIGo($point, $height)) {
            return;
        }

        $args = [...$previousPath->steps, $point];

        $currentPath = new Path(...$args);

        if ($height === 9) {
            $paths->addPath($currentPath);
            return;
        }

        foreach (Direction::cases() as $direction) {
            $newPoint = $point->moveTo($direction);

            static::findPaths($newPoint, $map, $height + 1, $paths, $currentPath);
        }
    }
}