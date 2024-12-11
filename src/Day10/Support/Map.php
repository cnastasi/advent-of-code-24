<?php

namespace DevDojo\Day10\Support;

class Map
{
    public function __construct(private readonly array $map)
    {
    }

    public function getHeight(Coordinates $coordinates): int
    {
        return (int)$this->map[$coordinates->y][$coordinates->x] ?? -1;
    }

    public function canIGo(Coordinates $coordinates, int $expectedHeight): bool
    {
        $height = $this->getHeight($coordinates);

        $result = $this->getHeight($coordinates) === $expectedHeight;

        return $result;
    }

    public static function fromString(string $input): Map {
        $map = array_map(
            static fn(string $line) => str_split($line),
            explode("\n", $input)
        );

        return new Map($map);
    }

    /**
     * @return array<Coordinates>
     */
    public function findTrailingHeads(): array
    {
        $trailingHeads = [];

        $size = count($this->map);

        for ($y = 0; $y < $size; $y++) {
            for ($x = 0; $x < $size; $x++) {
                if ($this->map[$y][$x] === '0') {
                    $trailingHeads[] = new Coordinates($x, $y);
                }
            }
        }

        return $trailingHeads;
    }

}