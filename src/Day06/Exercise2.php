<?php

namespace DevDojo\Day06;

use DevDojo\Day06\Support\Coordinates;
use DevDojo\Day06\Support\Direction;
use DevDojo\Day06\Support\LoopFinder;
use DevDojo\Day06\Support\Map;

class Exercise2
{
    private array $visitedPoints = [];

    private function generateMaps(Map $map): \Generator
    {
        $startingPoint = $map->findStartingPoint();

        for ($y = 0; $y < $map->size; $y++) {
            for ($x = 0; $x < $map->size; $x++) {
                $point = new Coordinates($x, $y);

                if ($map->thereIsAnObstacle($point) || $point->equals($startingPoint)) {
                    continue;
                }

                yield $map->insertAnObstacle($point);
            }
        }
    }

    public function execute(string $input): int
    {
        $baseMap = Map::fromString($input);
        $loopFinder = new LoopFinder();

        $loops = 0;

        foreach ($this->generateMaps($baseMap) as $map) {
            $loops += $loopFinder->thereIsALoop($map) ? 1 : 0;
        }

        return $loops;
    }


}