<?php

namespace DevDojo\Day08;

use DevDojo\Day08\Support\Coordinates;
use DevDojo\Day08\Support\Map;
use DevDojo\Day08\Support\Segment;
use Generator;

class Exercise1
{
    public static function execute(string $input): int
    {
        echo "$input\n";
        $map = new Map(static::normalizeInput($input));

        echo "Map Size: {$map->size}\n";

        $antennas = $map->findAllAntennas();

        $antinodes = [];

        foreach ($antennas as $frequency => $antennaGroup) {
            echo "Frequency: " . $frequency . "\n";
            foreach (static::extractSegments($antennaGroup) as $segment) {
                [$antinodeA, $antinodeB] = static::calculateAntinodesPosition($segment);

                self::saveAntinode($map, $antinodeA, $antinodes);
                self::saveAntinode($map, $antinodeB, $antinodes);
            }
        }

        $map->addAntinodes($antinodes);

        echo "$map";

        return count($antinodes);

        // calculate segments for each antennas pair
        // calculate position of antinodes
        // Add antinods to a list (if not out of bound)
        // calculate how many antinodes are created.
    }

    private static function normalizeInput(string $input): array
    {
        return array_map(
            static fn(string $line) => str_split($line),
            explode("\n", $input)
        );
    }

    /**
     * @param Map $map
     * @param mixed $antinode
     * @param array $antinodes
     * @return void
     */
    public static function saveAntinode(Map $map, Coordinates $antinode, array &$antinodes): void
    {
        if (!$map->isOutOfBound($antinode)) {
            echo "Saving $antinode\n";
            $antinodes[(string)$antinode] = $antinode;
        } else {
            echo "Out of bounds: $antinode\n";
        }
    }

    /**
     * @return array{Coordinates, Coordinates}
     */
    private static function calculateAntinodesPosition(Segment $segment): array
    {
        $forwardSegment = $segment->forward();
        $backwardSegment = $segment->backward();

        echo "Backward: $backwardSegment\n";
        echo "Forward: $forwardSegment\n";

        return [$backwardSegment->a, $forwardSegment->b];
    }

    /**
     * @param array<Coordinates> $antennaGroup
     * @return Generator<Segment>
     */
    private static function extractSegments(array $antennaGroup): Generator
    {
        for ($i = 0; $i < count($antennaGroup); $i++) {
            $segment = new Segment($antennaGroup[$i], $antennaGroup[$i + 1] ?? $antennaGroup[0]);

            echo "found $segment\n";

            yield $segment;
        }
    }
}