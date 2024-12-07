<?php

namespace DevDojo\Day06\Support;

class LoopFinder
{
    public function thereIsALoop(Map $map): bool
    {
        $cursor = $map->findStartingPoint();
        $direction = Direction::from('^');

        while (!$map->isOutOfBound($cursor)) {

            $nextPosition = $cursor->moveTo($direction);

            while ($map->thereIsAnObstacle($nextPosition)) {
                $key = "{$cursor}{$direction->name}";

                if (isset($turningPoints[$key])) {
                    return true;
                }

                $turningPoints[$key] = true;

                $direction = $direction->rotate();
                $nextPosition = $cursor->moveTo($direction);
            }

            $cursor = $nextPosition;

        }

        return false;
    }
}