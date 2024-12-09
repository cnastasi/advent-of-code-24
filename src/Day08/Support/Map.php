<?php

namespace DevDojo\Day08\Support;

use Couchbase\Coordinate;

class Map
{

    public readonly int $size;

    public function __construct(
        private array $map
    )
    {
        $this->size = count($this->map);
    }

    /**
     * @return array<array-key<string>, array<Coordinates>>
     */
    public function findAllAntennas(): array
    {
        $antennas = [];

        for ($y = 0; $y < $this->size; $y++) {
            for ($x = 0; $x < $this->size; $x++) {
                $value = $this->map[$y][$x];

                if ($value === '.') continue;

                $antennas[$value] ??= [];
                $antennas[$value][] = new Coordinates($x, $y);
            }
        }

        return $antennas;
    }

    public function isOutOfBound(Coordinates $point): bool
    {
        return $point->x < 0 || $point->y < 0 || $point->x >= $this->size || $point->y >= $this->size;
    }

    /**
     * @param array<Coordinates> $antinodes
     * @return void
     */
    public function addAntinodes(array $antinodes): void {
        foreach($antinodes as $antinode) {
            $this->map[$antinode->x][$antinode->y] = '#';
        }
    }

    public function __toString(): string
    {
        return "Map size: {$this->size}x{$this->size}\n" .
            implode("\n",
                array_map(
                    static fn(array $row) => implode("", $row),
                    $this->map
                )
            );
    }
}