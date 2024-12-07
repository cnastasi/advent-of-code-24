<?php

namespace DevDojo\Day06;

use DevDojo\Day06\Support\Direction;
use DevDojo\Day06\Support\Map;

class Exercise1
{
    private array $visitedPoints = [];

    public function execute(string $input): int
    {
        $map = Map::fromString($input);

        $cursor = $map->findStartingPoint();
        $direction = Direction::from('^');

        while (!$map->isOutOfBound($cursor)) {
            $nextPosition = $cursor->moveTo($direction);

            while ($map->thereIsAnObstacle($nextPosition)) {
                $direction = $direction->rotate();
                $nextPosition = $cursor->moveTo($direction);
            }

            $cursor = $nextPosition;

            if (!$map->isOutOfBound($cursor)) {
                $this->visitedPoints["{$cursor->x}_{$cursor->y}"] = true;
            }
        }

        return count($this->visitedPoints);
    }
}