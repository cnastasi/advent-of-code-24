<?php

namespace DevDojo\Day06\Support;

class Map
{
    private array $map;

    public readonly int $size;

    public function __construct(array &$map)
    {
        $this->map = $map;

        $this->size = count($this->map);
    }

    public static function fromString(string $input): self
    {
        $map = array_map(
            static fn(string $line) => str_split($line),
            explode("\n", $input)
        );

        return new self($map);
    }

    /**
     * @throws \Exception
     */
    public function findStartingPoint(): Coordinates
    {
        foreach ($this->map as $y => $line) {
            foreach ($line as $x => $point) {
                if ($point === '^') {
                    return new Coordinates($x, $y);
                }
            }
        }

        throw new \Exception('Ci sta qualcosa che non va');
    }

    public function isOutOfBound(Coordinates $cursor): bool
    {
        return $cursor->x < 0 || $cursor->x >= $this->size || $cursor->y < 0 || $cursor->y >= $this->size;
    }

    public function thereIsAnObstacle(Coordinates $cursor): bool
    {
        return $this->getPoint($cursor) === '#';
    }

    private function getPoint(Coordinates $cursor): string
    {
        return $this->map[$cursor->y][$cursor->x] ?? '.';
    }

    public function insertAnObstacle(Coordinates $point): Map
    {
        $newMap = $this->map;

        $newMap[$point->y][$point->x] = '#';

        return new Map($newMap);
    }
}