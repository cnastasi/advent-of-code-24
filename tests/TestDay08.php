<?php

namespace DevDojo;

use DevDojo\Day08\Exercise1;
use DevDojo\Day08\Support\Coordinates;
use DevDojo\Day08\Support\Map;
use DevDojo\Day08\Support\Segment;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class TestDay08 extends TestCase
{
    #[DataProvider('segmentTestCases')]
    public function testSegment(Coordinates $a, Coordinates $b, float $expected)
    {
        $segment = new Segment ($a, $b);

        Assert::assertEqualsWithDelta($expected, $segment->length, 0.001);
    }

    public function testSegment2()
    {
        $segment = new Segment (new Coordinates(0, 0), new Coordinates(0, 2));

        Assert::assertEquals(new Segment (new Coordinates(0, 2), new Coordinates(0, 4)), $segment->forward());
        Assert::assertEquals(new Segment (new Coordinates(0, -2), new Coordinates(0, 0)), $segment->backward());
    }

    public function testSegment3()
    {
        $segment = new Segment (new Coordinates(0, 0), new Coordinates(2, 2));

        Assert::assertEquals(new Segment (new Coordinates(2, 2), new Coordinates(4, 4)), $segment->forward());
        Assert::assertEquals(new Segment (new Coordinates(-2, -2), new Coordinates(0, 0)), $segment->backward());
    }

    public function testSegment4()
    {
        $segment = new Segment (new Coordinates(10, 10), new Coordinates(5, 15));

        Assert::assertEquals(-5, $segment->dx);
        Assert::assertEquals(+5, $segment->dy);

        Assert::assertEquals(new Segment (new Coordinates(0, 20), new Coordinates(5, 15)), $segment->forward());
        Assert::assertEquals(new Segment (new Coordinates(15, 5), new Coordinates(10, 10)), $segment->backward());
    }


    public static function segmentTestCases(): \Generator
    {
        yield [new Coordinates(0, 0), new Coordinates(0, 0), 0];
        yield [new Coordinates(0, 0), new Coordinates(0, 2), 2];
        yield [new Coordinates(0, 0), new Coordinates(2, 0), 2];
        yield [new Coordinates(0, 0), new Coordinates(2, 2), 2.828];
    }

    public function testFindAllAntenna(): void
    {
        $map = new Map(
            [
                ['.', '.', '.'],
                ['.', 'A', '.'],
                ['.', '.', '.'],
            ]
        );

        $antennas = $map->findAllAntennas();

        $expected = ['A' => [new Coordinates(1, 1)]];

        Assert::assertEquals($expected, $antennas);
    }

    public function testFindAllAntenna2(): void
    {
        $map = new Map(
            [
                ['A', '.', '.'],
                ['v', 'A', 'v'],
                ['b', 'b', 'b'],
            ]
        );

        $antennas = $map->findAllAntennas();

        $expected = [
            'A' => [
                new Coordinates(0, 0),
                new Coordinates(1, 1),
            ],
            'v' => [
                new Coordinates(0, 1),
                new Coordinates(2, 1),
            ],
            'b' => [
                new Coordinates(0, 2),
                new Coordinates(1, 2),
                new Coordinates(2, 2),
            ],
        ];

        Assert::assertEquals($expected, $antennas);
    }

    public function testExample(): void
    {
        $input = <<<INPUT
                 ............
                 ........0...
                 .....0......
                 .......0....
                 ....0.......
                 ......A.....
                 ............
                 ............
                 ........A...
                 .........A..
                 ............
                 ............
                 INPUT;

        $result = Day08\Exercise1::execute($input);

        Assert::assertSame(14, $result);
    }


}


