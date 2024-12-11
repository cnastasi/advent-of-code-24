<?php

namespace DevDojo\Day10;

use DevDojo\Day10\Support\Coordinates;
use DevDojo\Day10\Support\Direction;
use DevDojo\Day10\Support\Map;
use DevDojo\Day10\Support\Tails;

class Exercise1
{
    public static function execute(string $input): int
    {
        $map = Map::fromString($input);

        $trailingHeads = $map->findTrailingHeads();

        $sum = 0;
        foreach ($trailingHeads as $head) {
            $tails = new Tails();
            static::findTails($head, $map, 0, $tails);
            $sum += $tails->count;
        }

        return $sum;
    }

    private static function findTails(Coordinates $point, Map $map, int $height, Tails $tails): void
    {
        if (!$map->canIGo($point, $height)) {
            return;
        }

        if ($height === 9) {
            $tails->addTail($point);
            return;
        }

        foreach (Direction::cases() as $direction) {
            $newPoint = $point->moveTo($direction);

            static::findTails($newPoint, $map, $height + 1, $tails);
        }
    }
}